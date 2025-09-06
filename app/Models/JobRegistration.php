<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobRegistration extends Model
{
    protected $fillable = [
        'user_id',
        'vacancy_id',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vacancy()
    {
        return $this->belongsTo(Vacancy::class, 'vacancy_id');
    }
}
