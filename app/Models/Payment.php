<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'job_registration_id',
        'amount',
        'status',
        'snap_token',
        'payment_method',
    ];

    public function user()
    {
        return $this->hasOneThrough(User::class, JobRegistration::class, 'id', 'id', 'job_registration_id', 'user_id');
    }

    public function jobRegistration()
    {
        return $this->belongsTo(JobRegistration::class);
    }
}
