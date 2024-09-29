<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierReturn extends Model
{
    use HasFactory;
    protected $fillable = ['supplier_name', 'invoice_number', 'date', 'total_amount'];
}
