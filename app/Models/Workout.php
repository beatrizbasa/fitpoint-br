<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Workout extends Model
{
    use HasFactory;

    protected $fillable = [
        'workout_id',
        'client_id',
        'workout_date',
        'focus',
        'exercises'
    ];

    public function setDateAttribute( $value ) {
        $this->attributes['workout_date'] = (new Carbon($value))->format('d/m/y');
      }
}
