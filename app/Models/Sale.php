<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
         'date' ,
         'product_name' ,
         'batch_no',
         'quantity',
         'unit',
         'rate', 
         'discount_percentage',
         'dis_value',
         'vat',
         'vat_value',
         'total' ,
         'sale_discount',
         'total_discount',
         'total_vat',
         'shipping_cost' ,
         'net_total',
         'due',
         'change' ,
         'payment_type' ,
         'paid_amount', 
     ];
    
 public function customer()
 {
     return $this->belongsTo(Customer::class, 'customer_id');
 }
}
