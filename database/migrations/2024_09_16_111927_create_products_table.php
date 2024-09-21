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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('barcode')->nullable();
            $table->string('sn')->nullable();
            $table->string('product_name');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); 
            $table->decimal('sale_price', 10, 2)->nullable(); 
            $table->decimal('cost_price', 10, 2)->nullable(); 
            $table->foreignId('supplier_id')->constrained('suppliers')->onDelete('cascade'); 
            $table->string('image')->nullable(); 
            $table->string('model')->nullable(); 
            $table->foreignId('unit_id')->nullable()->constrained('units')->onDelete('set null');
            $table->text('details')->nullable(); 
            $table->decimal('vat', 5, 2)->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
