<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'barcode', 'sn', 'product_name', 'category_id', 'sale_price', 'cost_price',
        'supplier_id', 'image', 'model', 'unit_id', 'details', 'vat'
    ];
    public function supplier()
{
    return $this->belongsTo(Supplier::class, 'supplier_id');
}
}
