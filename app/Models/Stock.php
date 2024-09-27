<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id', 'quantity', 'status'
    ];

    // Relationship to the Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Method to check stock status
    public function getStatusLabel()
    {
        if ($this->status == 'inactive' || $this->quantity == 0) {
            return 'Out of Stock';
        }

        return 'Available';
    }
}



