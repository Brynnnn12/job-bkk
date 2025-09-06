<?php

use Illuminate\Support\Facades\Route;

// Midtrans webhook - no CSRF protection needed for external webhooks
Route::post('/midtrans/webhook', [\App\Http\Controllers\PaymentController::class, 'webhook']);
