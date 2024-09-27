<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesReturn extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = ['product_name', 'invoice_no', 'customer_name', 'date', 'total_amount'];


    public function products()
{
    return $this->hasMany(Product::class);
}
}
