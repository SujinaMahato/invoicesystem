@extends('layouts.app')

@section('content')
<div class="container p-6 mx-auto">
    <div class="p-4 bg-white rounded-md shadow">
        <h1 class="mb-4 text-xl font-bold">Edit Purchase</h1>

        <!-- Display Success Message -->
        @if(session('success'))
            <div class="p-4 mb-4 text-white bg-purple-500 rounded">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('purchases.update', $purchase->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="chalan_no" class="block text-sm font-medium text-gray-700">Chalan No</label>
            <input type="text" name="chalan_no" value="{{ old('chalan_no', $purchase->chalan_no) }}" required class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-purple-300">

            <label for="supplier_id" class="block mt-4 text-sm font-medium text-gray-700">Supplier</label>
            <select name="supplier_id" required class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-purple-300">
                @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->id }}" {{ $supplier->id == $purchase->supplier_id ? 'selected' : '' }}>
                        {{ $supplier->name }}
                    </option>
                @endforeach
            </select>

            <label for="purchase_date" class="block mt-4 text-sm font-medium text-gray-700">Purchase Date</label>
            <input type="date" name="purchase_date" value="{{ old('purchase_date', $purchase->purchase_date) }}" required class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-purple-300">

            <h2 class="mt-4 mb-2 text-lg font-semibold">Product Details</h2>
            <div class="p-4 mb-4 border border-gray-300 rounded-md">
                <label for="product_name" class="block text-sm font-medium text-gray-700">Product Name</label>
                <input type="text" name="product_name" value="{{ old('product_name', $purchase->product_name) }}" required class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-purple-300">

                <label for="quantity" class="block mt-2 text-sm font-medium text-gray-700">Quantity</label>
                <input type="number" name="quantity" value="{{ old('quantity', $purchase->quantity) }}" required min="1" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-purple-300">

                <label for="rate" class="block mt-2 text-sm font-medium text-gray-700">Rate</label>
                <input type="number" name="rate" value="{{ old('rate', $purchase->rate) }}" required class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-purple-300">

                <label for="discount_percentage" class="block mt-2 text-sm font-medium text-gray-700">Discount (%)</label>
                <input type="number" name="discount_percentage" value="{{ old('discount_percentage', $purchase->discount_percentage ?? 0) }}" min="0" max="100" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-purple-300">
            </div>

            <label for="grand_total" class="block mt-4 text-sm font-medium text-gray-700">Grand Total</label>
            <input type="number" name="grand_total" value="{{ old('grand_total', $purchase->grand_total) }}" required class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-purple-300">

            <label for="payment_type" class="block mt-4 text-sm font-medium text-gray-700">Payment Type</label>
            <select name="payment_type" required class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-purple-300">
                <option value="cash" {{ $purchase->payment_type == 'cash' ? 'selected' : '' }}>Cash</option>
                <option value="credit" {{ $purchase->payment_type == 'credit' ? 'selected' : '' }}>Credit</option>
            </select>

            <button type="submit" class="px-4 py-2 mt-4 text-white bg-purple-500 rounded-md">Update Purchase</button>
        </form>
    </div>
</div>
@endsection
