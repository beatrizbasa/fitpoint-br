<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fullname extends Model
{
    public function getFullNameAttribute($value)
    {
        return $this->first_name . " " . $this->last_name;
    }
}
