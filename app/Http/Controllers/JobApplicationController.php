<?php

namespace App\Http\Controllers;

use App\Models\JobRegistration;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobApplicationController extends Controller
{
    public function apply($vacancyId)
    {
        // Check if user is admin, redirect to admin panel
        if (Auth::user()->hasRole('Admin')) {
            return redirect('/admin');
        }

        $vacancy = Vacancy::with(['company', 'category'])->findOrFail($vacancyId);

        // Check if user already applied
        $existingApplication = JobRegistration::where('user_id', Auth::id())
            ->where('vacancy_id', $vacancyId)
            ->first();

        if ($existingApplication) {
            return redirect()->back()->with('error', 'Anda sudah melamar untuk posisi ini.');
        }

        return view('job.apply', compact('vacancy'));
    }

    public function store(Request $request)
    {
        // Check if user is admin based on role relationship
        if (Auth::user()->hasRole('Admin')) {
            return redirect('/admin');
        }
        $request->validate([
            'vacancy_id' => 'required|exists:vacancies,id',
        ]);

        // Check if user already applied
        $existingApplication = JobRegistration::where('user_id', Auth::id())
            ->where('vacancy_id', $request->vacancy_id)
            ->first();

        if ($existingApplication) {
            return redirect()->back()->with('error', 'Anda sudah melamar untuk posisi ini.');
        }

        // Get vacancy data for fee information
        $vacancy = Vacancy::findOrFail($request->vacancy_id);

        $jobRegistration = JobRegistration::create([
            'user_id' => Auth::id(),
            'vacancy_id' => $request->vacancy_id,
            'status' => 'pending',
        ]);

        // Check if vacancy has fee (payment required)
        if ($vacancy->fee && $vacancy->fee > 0) {
            // Create payment record
            $payment = \App\Models\Payment::create([
                'job_registration_id' => $jobRegistration->id,
                'amount' => $vacancy->fee,
                'status' => 'pending',
                'payment_method' => 'transfer',
                'snap_token' => null,
            ]);

            return redirect()->route('payment.show', $payment->id)->with('success', 'Lamaran berhasil dikirim! Silakan lakukan pembayaran untuk menyelesaikan proses lamaran.');
        }

        return redirect()->route('dashboard')->with('success', 'Lamaran Anda berhasil dikirim!');
    }

    public function myApplications()
    {
        // Check if user is admin, redirect to admin panel
        if (Auth::user()->hasRole('Admin')) {
            return redirect('/admin');
        }

        $applications = JobRegistration::with(['vacancy.company', 'vacancy.category'])
            ->where('user_id', Auth::id())
            ->latest()
            ->paginate(10);

        return view('dashboard.applications', compact('applications'));
    }
}
