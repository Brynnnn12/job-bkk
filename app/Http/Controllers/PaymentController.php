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

        // Update payment method
        $payment->update([
            'payment_method' => $request->payment_method,
        ]);

        // Handle payment based on method
        if ($request->payment_method === 'tunai') {
            // For cash payment, mark as completed immediately
            $payment->update(['status' => 'completed']);
            $payment->jobRegistration->update(['status' => 'approved']);

            return redirect()->route('payment.success', $payment->id)->with('success', 'Pembayaran tunai berhasil dicatat! Silakan datang ke kantor untuk menyelesaikan pembayaran.');
        } else {
            // For transfer payment, show Midtrans alert (since not configured yet)
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
