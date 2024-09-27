<!-- resources/views/admin/stock/add.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container p-6 mx-auto">
        <h2 class="mb-4 text-2xl font-bold">Add New Stock</h2>

        <form action="{{ route('stocks.store') }}" method="POST" class="px-8 pt-6 pb-8 mb-4 bg-white rounded shadow-md">
            @csrf
            <div class="mb-4">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="product_id">Product</label>
                <select name="product_id" id="product_id" class="block w-full mt-1 form-select">
                    <option value="">Select a Product</option>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                    @endforeach
                </select>
                @error('product_id')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="quantity">Quantity</label>
                <input type="number" name="quantity" id="quantity" class="block w-full mt-1 form-input" required>
                @error('quantity')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="status">Status</label>
                <select name="status" id="status" class="block w-full mt-1 form-select">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
                @error('status')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="px-4 py-2 text-white bg-purple-500 rounded">Add Stock</button>
                <a href="{{ route('stocks.list') }}" class="text-purple-500">Cancel</a>
            </div>
        </form>
    </div>
@endsection
