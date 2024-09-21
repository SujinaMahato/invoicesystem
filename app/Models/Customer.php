<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_name',
        'email',
        'phone',
        'vat_no',
        'address',
        'city',
        'state',
        'country',
        'pan_no',
        'balance',
        'status',
    ];
}
