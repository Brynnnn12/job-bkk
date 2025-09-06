<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\JobApplicationController;
use Illuminate\Support\Facades\Route;

// Landing Page Routes
Route::get('/', [LandingController::class, 'index'])->name('landing.index');
Route::get('/jobs', [LandingController::class, 'jobs'])->name('landing.jobs');
Route::get('/jobs/{id}', [LandingController::class, 'jobDetail'])->name('landing.job-detail');
Route::get('/companies', [LandingController::class, 'companies'])->name('landing.companies');
Route::get('/companies/{slug}', [LandingController::class, 'companyDetail'])->name('landing.company-detail');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'user'])->name('dashboard');

// Job Application Routes (require auth)
Route::middleware(['auth'])->group(function () {
    Route::get('/job/apply/{vacancy}', [JobApplicationController::class, 'apply'])->name('job.apply');
    Route::post('/job/apply', [JobApplicationController::class, 'store'])->name('job.store');
    Route::get('/dashboard/applications', [JobApplicationController::class, 'myApplications'])->name('dashboard.applications');
});

// Payment Routes (require auth)
Route::middleware(['auth'])->group(function () {
    Route::get('/payment/{payment}', [\App\Http\Controllers\PaymentController::class, 'show'])->name('payment.show');
    Route::post('/payment/{payment}/process', [\App\Http\Controllers\PaymentController::class, 'process'])->name('payment.process');
    Route::get('/payment/{payment}/success', [\App\Http\Controllers\PaymentController::class, 'success'])->name('payment.success');
    Route::get('/payment/{payment}/error', [\App\Http\Controllers\PaymentController::class, 'error'])->name('payment.error');
    Route::get('/payment/{payment}/check-status', [\App\Http\Controllers\PaymentController::class, 'checkStatus'])->name('payment.check-status');
    Route::get('/payment/{payment}/tunai', [\App\Http\Controllers\PaymentController::class, 'tunai'])->name('payment.tunai');
    Route::get('/dashboard/payments', [\App\Http\Controllers\PaymentController::class, 'myPayments'])->name('dashboard.payments');
});

// Route untuk admin - redirect ke Filament admin panel
Route::get('/admin-dashboard', function () {
    return redirect('/admin');
})->middleware(['auth', 'admin'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
