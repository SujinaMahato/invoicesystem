<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $fillable = [
        'supplier_id',
        'chalan_no',
        'purchase_date',
        'product_name',
        'stock_quantity',
        'expiry_date',
        'batch_no',
        'quantity',
        'rate',
        'discount_percentage',
        'discount_value',
        'vat',
        'vat_value',
        'total',
        'purchase_discount',
        'total_discount',
        'total_vat',
        'grand_total',
        'paid_amount',
        'due_amount',
        'payment_type',
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
    public function products()
{
    return $this->hasMany(Product::class);
}
}
