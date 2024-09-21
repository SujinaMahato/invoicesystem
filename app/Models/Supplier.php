<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'email', 'phone', 'address1', 'address2', 'city', 'state', 'ward_no', 'mobile_no', 'pan_no',
    ];
}
