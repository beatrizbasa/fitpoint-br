<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'appointment_id',
        'client_id',
        'medical_condition',
        'target',
        'instructor_id',
        'appointment_date',
        'appointment_time',
        'status',
    ];
}
