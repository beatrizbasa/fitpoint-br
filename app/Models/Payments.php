<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payments extends Model
{
    // app/Models/Payment.php

    use SoftDeletes;
    protected $dates = ['deleted_at'];
      protected $table = 'payments'; // Specify the table name if it's different from the model name
      protected $fillable = ['firstname', 'lastname', 'address', 'email',  'contact_no', 'gender', 'amount' ];
      protected $casts = [
       'status' => 'string',
    ];

}
