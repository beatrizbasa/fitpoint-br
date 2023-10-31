<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'appointment_id',
        'client_id',
        'medical_condition',
        'target',
        'personal_trainer_id',
        'appointment_date',
        'appointment_time',
        'status',
    ];
}
