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

    public function getFullNameAttribute($value) {
        // $appointments = Appointment::select('*')
        //     ->join('personal_trainers', 'personal_trainers.id', '=', 'appointments.personal_trainer_id')
        //     // ->where('countries.country_name', 'cdcd')
        //     ->get();
        return $this->attributes['firstname'] . ' ' . $this->attributes['lastname'];
    }
}
