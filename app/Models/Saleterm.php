<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saleterm extends Model
{
    use HasFactory;
    protected $fillable=[
        'terms_and_conditions',
        'status',
    ];
}
