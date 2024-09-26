<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supplier_id')->constrained()->onDelete('cascade');
            $table->string('chalan_no');
            $table->date('purchase_date');
            $table->string('product_name'); // You can change this to JSON if you want to store multiple products in a single row
            $table->decimal('stock_quantity', 10, 2)->default(0);
            $table->date('expiry_date')->nullable();
            $table->string('batch_no')->nullable();
            $table->decimal('quantity', 10, 2);
            $table->decimal('rate', 10, 2);
            $table->decimal('discount_percentage', 5, 2)->nullable();
            $table->decimal('discount_value', 10, 2)->nullable();
            $table->decimal('vat', 5, 2)->nullable();
            $table->decimal('vat_value', 10, 2)->nullable();
            $table->decimal('total', 10, 2)->nullable();
            $table->decimal('purchase_discount', 10, 2)->nullable();
            $table->decimal('total_discount', 10, 2)->nullable();
            $table->decimal('total_vat', 10, 2)->nullable();
            $table->decimal('grand_total', 10, 2);
            $table->decimal('paid_amount', 10, 2)->nullable();
            $table->decimal('due_amount', 10, 2)->nullable();
            $table->enum('payment_type', ['cash', 'card'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
