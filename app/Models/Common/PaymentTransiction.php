<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentTransiction extends Model
{
    use HasFactory;
    protected $table= 'payment_transictions';

    protected $fillable = [
        'amount',
        'courses_id',
        'users_id',
        'adm_id',
        'traxid',
        'phone'
    ];

}
