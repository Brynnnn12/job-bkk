<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\JobRegistration;
use Illuminate\Support\Facades\Auth;

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
}
