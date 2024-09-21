@extends('layouts.app')

@section('content')
<div class="container p-4 mx-auto bg-white rounded-lg shadow">
    <h1 class="mb-4 text-2xl font-bold">Add Product</h1>

    <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Barcode/QR Code -->
        <div class="grid grid-cols-2 gap-3 mb-3">
            <div>
                <label for="barcode" class="block text-sm font-medium">Barcode/QR-code</label>
                <input type="text" name="barcode" id="barcode" class="block w-full mt-1 border-gray-300 rounded-md py-1.5 px-2">
            </div>

            <div>
                <label for="sn" class="block text-sm font-medium">SN</label>
                <input type="text" name="sn" id="sn" class="block w-full mt-1 border-gray-300 rounded-md py-1.5 px-2">
            </div>
        </div>

        <!-- Product Name and Category -->
        <div class="grid grid-cols-2 gap-3 mb-3">
            <div>
                <label for="product_name" class="block text-sm font-medium">Product Name *</label>
                <input type="text" name="product_name" id="product_name" class="block w-full mt-1 border-gray-300 rounded-md py-1.5 px-2" required>
            </div>

            <div>
                <label for="category" class="block text-sm font-medium">Category *</label>
                <select name="category_id" id="category" class="block w-full mt-1 border-gray-300 rounded-md py-1.5 px-2" required>
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Sale Price, Cost Price, and Supplier -->
        <div class="grid grid-cols-2 gap-3 mb-3">
            <div>
                <label for="sale_price" class="block text-sm font-medium">Sale Price</label>
                <input type="number" name="sale_price" id="sale_price" class="block w-full mt-1 border-gray-300 rounded-md py-1.5 px-2" step="0.01">
            </div>

            <div>
                <label for="cost_price" class="block text-sm font-medium">Cost Price</label>
                <input type="number" name="cost_price" id="cost_price" class="block w-full mt-1 border-gray-300 rounded-md py-1.5 px-2" step="0.01">
            </div>
        </div>

        <div class="grid grid-cols-2 gap-3 mb-3">
            <div>
                <label for="supplier" class="block text-sm font-medium">Supplier *</label>
                <select name="supplier_id" id="supplier" class="block w-full mt-1 border-gray-300 rounded-md py-1.5 px-2" required>
                    <option value="">Select Supplier</option>
                    @foreach($suppliers as $supplier)
                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Image Upload -->
            <div>
                <label for="image" class="block text-sm font-medium">Image</label>
                <input type="file" name="image" id="image" class="block w-full mt-1 border-gray-300 rounded-md py-1.5 px-2">
            </div>
        </div>

        <!-- Product Details, Model, and VAT -->
        <div class="grid grid-cols-2 gap-3 mb-3">
            <div>
                <label for="model" class="block text-sm font-medium">Model</label>
                <input type="text" name="model" id="model" class="block w-full mt-1 border-gray-300 rounded-md py-1.5 px-2">
            </div>

            <div>
                <label for="unit" class="block text-sm font-medium">Unit</label>
                <select name="unit_id" id="unit" class="block w-full mt-1 border-gray-300 rounded-md py-1.5 px-2">
                    <option value="">Select Unit</option>
                    @foreach($units as $unit)
                    <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                @endforeach
                </select>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-3 mb-3">
            <div>
                <label for="details" class="block text-sm font-medium">Product Details</label>
                <textarea name="details" id="details" class="block w-full mt-1 border-gray-300 rounded-md py-1.5 px-2"></textarea>
            </div>

            <div>
                <label for="vat" class="block text-sm font-medium">Product VAT %</label>
                <input type="number" name="vat" id="vat" class="block w-full mt-1 border-gray-300 rounded-md py-1.5 px-2" step="0.01">
            </div>
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit" class="px-4 py-2 text-white bg-purple-500 rounded-md">Save</button>
        </div>
    </form>
</div>
@endsection
