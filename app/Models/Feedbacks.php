<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedbacks extends Model
{
    use HasFactory;

    protected $fillable = [
        'feedback_id',
        'client_id',
        'content',
        'personal_trainer_id',
    ];
}
