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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');
            
            $table->date('date');
            
            $table->string('product_name');
            $table->string('batch_no')->nullable();
            $table->decimal('quantity', 10, 2)->nullable();
            $table->decimal('unit', 10, 2)->nullable();
            $table->decimal('rate', 10, 2)->nullable();
            $table->decimal('discount_percentage', 10, 2)->nullable();
            $table->decimal('dis_value', 10, 2)->nullable();
            $table->decimal('vat', 10, 2)->nullable();
            $table->decimal('vat_value', 10, 2)->nullable();
            $table->decimal('total', 10, 2);
            $table->decimal('sale_discount', 10, 2)->nullable();
            $table->decimal('total_discount', 10, 2)->nullable();
            $table->decimal('total_vat', 10, 2)->nullable();
            $table->decimal('shipping_cost', 10, 2)->nullable();
            $table->decimal('grand_total', 10, 2)->nullable();
            $table->decimal('net_total', 10, 2)->nullable();
            $table->decimal('due', 10, 2)->nullable();
            $table->decimal('change', 10, 2)->nullable();
            $table->decimal('paid_amount', 10, 2)->nullable();
            $table->enum('payment_type', ['cash']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
