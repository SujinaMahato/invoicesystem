@extends('layouts.app')

@section('content')
<div class="max-w-2xl p-8 mx-auto bg-white rounded-lg shadow-lg">
    <h2 class="mb-6 text-2xl font-bold">Edit Sales Return</h2>

    <form action="{{ route('sales_returns.update', $salesReturns->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
            <div>
                <label for="customer_name" class="block text-sm font-medium text-gray-700">Customer Name*</label>
                <input type="text" name="customer_name" value="{{ old('customer_name', $salesReturns->customer_name) }}" required>
            </div>
        <div>
            <label for="product_name" class="block text-sm font-medium">Product Name<span class="text-red-500">*</span></label>
            <input type="text" name="product_name" value="{{ old('product_name', $salesReturns->product_name) }}" required>
        </div>
        <div>
            <label for="invoice_no" class="block text-sm font-medium text-gray-700">Invoice No</label>
            <input type="text" name="invoice_no" value="{{ old('invoice_no', $salesReturns->invoice_no) }}" required>
        </div>
        <div>
            <label for="date" class="block text-sm font-medium">Return Date <span class="text-red-500">*</span></label>
            <input type="date" name="date" value="{{ old('date', $salesReturns->date) }}"required>
        </div>
        <div>
            <label for="total_amount" class="block text-sm font-medium text-gray-700">Total Amount</label>
            <input type="number" name="total_amount"value="{{ old('total_amount', $salesReturns->total_amount) }}" required>
        </div>

        <div class="mt-6 text-right">
            <button type="submit" class="px-4 py-2 text-white bg-purple-500 rounded-lg shadow-lg hover:bg-pink-600">Update Return</button>
        </div>
    </div>
    </form>
@endsection