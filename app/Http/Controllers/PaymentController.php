<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\JobRegistration;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function show($paymentId)
    {



        $payment = Payment::with(['jobRegistration.vacancy.company', 'jobRegistration.vacancy.category', 'jobRegistration.user'])
            ->where('id', $paymentId)
            ->whereHas('jobRegistration', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->firstOrFail();

        return view('payment.show', compact('payment'));
    }

    public function process(Request $request, $paymentId)
    {
        $request->validate([
            'payment_method' => 'required|in:tunai,transfer',
        ]);

        $payment = Payment::where('id', $paymentId)
            ->whereHas('jobRegistration', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->firstOrFail();

        // pembayaran hanya bisa diproses jika status pending
        if ($payment->status !== 'pending') {
            return redirect()->back()->with('error', 'Pembayaran sudah diproses sebelumnya.');
        }
        // Update metode pembayaran
        $payment->update([
            'payment_method' => $request->payment_method,
        ]);

        // Proses berdasarkan metode pembayaran
        if ($request->payment_method === 'tunai') {
            // Untuk pembayaran tunai, langsung set status ke completed
            $payment->update(['status' => 'completed']);
            $payment->jobRegistration->update(['status' => 'approved']);

            return redirect()->route('payment.success', $payment->id)->with('success', 'Pembayaran tunai berhasil dicatat! Silakan datang ke kantor untuk menyelesaikan pembayaran.');
        } else {
            // === Midtrans Snap ===
            \App\Services\MidtransConfig::setConfig();

            $params = [
                'transaction_details' => [
                    'order_id' => 'ORDER-' . $payment->id,
                    'gross_amount' => $payment->amount,
                ],
                'customer_details' => [
                    'name'  => Auth::user()->name,
                    'email' => Auth::user()->email,
                ],
            ];

            $snapToken = \Midtrans\Snap::getSnapToken($params);

            $payment->update([
                'snap_token' => $snapToken,
            ]);
            return redirect()->back()->with('info', 'Fitur pembayaran transfer dengan Midtrans sedang dalam pengembangan. Silakan pilih pembayaran tunai untuk sementara.');
        }
    }

    public function success($paymentId)
    {
        $payment = Payment::with(['jobRegistration.vacancy.company', 'jobRegistration.vacancy.category'])
            ->where('id', $paymentId)
            ->whereHas('jobRegistration', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->firstOrFail();

        return view('payment.success', compact('payment'));
    }

    public function myPayments()
    {
        $payments = Payment::with(['jobRegistration.vacancy.company', 'jobRegistration.vacancy.category'])
            ->whereHas('jobRegistration', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->latest()
            ->paginate(10);

        return view('payment.history', compact('payments'));
    }

    public function error($paymentId)
    {
        $payment = Payment::with(['jobRegistration.vacancy.company', 'jobRegistration.vacancy.category'])
            ->where('id', $paymentId)
            ->whereHas('jobRegistration', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->firstOrFail();

        // Update status payment menjadi failed jika masih pending
        if ($payment->status === 'pending') {
            $payment->update(['status' => 'failed']);
        }

        return view('payment.error', compact('payment'));
    }

    public function checkStatus($paymentId)
    {
        $payment = Payment::with(['jobRegistration.vacancy.company', 'jobRegistration.vacancy.category'])
            ->where('id', $paymentId)
            ->whereHas('jobRegistration', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->firstOrFail();

        // Jika payment menggunakan snap token (Midtrans), cek status dari Midtrans
        if ($payment->snap_token && $payment->status === 'pending') {
            try {
                \App\Services\MidtransConfig::setConfig();

                $orderId = 'ORDER-' . $payment->id;
                $status = \Midtrans\Transaction::status($orderId);

                // Update status berdasarkan response Midtrans
                $transactionStatus = $status->transaction_status ?? '';
                $fraudStatus = $status->fraud_status ?? '';

                switch ($transactionStatus) {
                    case 'capture':
                        if ($fraudStatus == 'challenge') {
                            $payment->update(['status' => 'processing']);
                        } else if ($fraudStatus == 'accept') {
                            $payment->update(['status' => 'completed']);
                            $payment->jobRegistration->update(['status' => 'approved']);
                        }
                        break;
                    case 'settlement':
                        $payment->update(['status' => 'completed']);
                        $payment->jobRegistration->update(['status' => 'approved']);
                        break;
                    case 'pending':
                        $payment->update(['status' => 'pending']);
                        break;
                    case 'deny':
                    case 'expire':
                    case 'cancel':
                        $payment->update(['status' => 'failed']);
                        break;
                }

                // Refresh payment data
                $payment->refresh();
            } catch (\Exception $e) {
                Log::error('Error checking payment status: ' . $e->getMessage());
            }
        }

        // Redirect berdasarkan status payment
        switch ($payment->status) {
            case 'completed':
                return redirect()->route('payment.success', $payment->id)
                    ->with('success', 'Pembayaran berhasil dikonfirmasi!');
            case 'processing':
                return redirect()->route('payment.show', $payment->id)
                    ->with('info', 'Pembayaran sedang diverifikasi. Mohon tunggu beberapa saat.');
            case 'failed':
                return redirect()->route('payment.error', $payment->id)
                    ->with('error', 'Pembayaran gagal. Silakan coba lagi.');
            default:
                return redirect()->route('payment.show', $payment->id)
                    ->with('info', 'Status pembayaran: ' . ucfirst($payment->status));
        }
    }

    public function tunai($paymentId)
    {
        $payment = Payment::with(['jobRegistration.vacancy.company', 'jobRegistration.vacancy.category'])
            ->where('id', $paymentId)
            ->whereHas('jobRegistration', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->firstOrFail();

        // Pembayaran tunai hanya bisa diproses jika status pending
        if ($payment->status !== 'pending') {
            return redirect()->route('payment.show', $payment->id)
                ->with('error', 'Pembayaran sudah diproses sebelumnya.');
        }

        // Update payment method dan status
        $payment->update([
            'payment_method' => 'tunai',
            'status' => 'processing' // Set ke processing, akan dikonfirmasi manual oleh admin
        ]);

        return redirect()->route('payment.show', $payment->id)
            ->with('success', 'Pembayaran tunai berhasil dipilih! Silakan datang ke kantor untuk menyelesaikan pembayaran. Status akan diupdate setelah konfirmasi admin.');
    }

    public function webhook(Request $request)
    {
        try {
            \App\Services\MidtransConfig::setConfig();

            $notif = new \Midtrans\Notification();
            $transaction = $notif->transaction_status;
            $type = $notif->payment_type;
            $order_id = $notif->order_id;
            $fraud = $notif->fraud_status;

            // Extract payment ID from order_id (format: ORDER-{payment_id})
            $payment_id = str_replace('ORDER-', '', $order_id);
            $payment = Payment::find($payment_id);

            if (!$payment) {
                Log::error('Payment not found for order_id: ' . $order_id);
                return response('Payment not found', 404);
            }

            Log::info('Midtrans webhook received for payment ID: ' . $payment_id . ', status: ' . $transaction);

            switch ($transaction) {
                case 'capture':
                    // Untuk credit card
                    if ($type == 'credit_card') {
                        if ($fraud == 'challenge') {
                            $payment->update(['status' => 'processing']);
                        } else {
                            $payment->update(['status' => 'completed']);
                            $payment->jobRegistration->update(['status' => 'approved']);
                        }
                    }
                    break;

                case 'settlement':
                    $payment->update(['status' => 'completed']);
                    $payment->jobRegistration->update(['status' => 'approved']);
                    break;

                case 'pending':
                    $payment->update(['status' => 'pending']);
                    break;

                case 'deny':
                case 'expire':
                case 'cancel':
                    $payment->update(['status' => 'failed']);
                    break;
            }

            return response('OK', 200);
        } catch (\Exception $e) {
            Log::error('Midtrans webhook error: ' . $e->getMessage());
            return response('Error', 500);
        }
    }
}
