@extends('layouts.app') <!-- Assuming you have a layout file -->

@section('content')
<div class="max-w-2xl p-8 mx-auto bg-white rounded-lg shadow-lg">
    <h2 class="mb-6 text-2xl font-bold">Sales Return</h2>
    
    <!-- Display validation errors if any -->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <!-- Form for submitting sales return -->
    <form action="{{ route('sales_returns.store') }}" method="POST">
        @csrf
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
            <div>
                <label for="customer_name" class="block text-sm font-medium text-gray-700">Customer Name*</label>
                <select name="customer_name" id="customer_name" class="w-full p-2 border border-gray-400 rounded">
                    <option selected disabled>Select One</option>
                @foreach (App\Models\Customer:: all() as $customer )
                <option value="{{$customer->customer_name}}">{{$customer->customer_name}}</option>
                @endforeach
                </select>
            </div>
        <div>
            <label for="product_name" class="block text-sm font-medium">Product Name<span class="text-red-500">*</span></label>
            <select name="product_name" id="product_name" class="w-full p-2 border border-gray-400 rounded">
                <option selected disabled>Select One</option>
            @foreach (App\Models\Product:: all() as $product )
            <option value="{{$product->product_name}}">{{$product->product_name}}</option>
            @endforeach
            </select>

        </div>
        <div>
            <label for="invoice_no" class="block text-sm font-medium text-gray-700">Invoice No</label>
            <input type="text" name="invoice_no" id="invoice_no" required class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
        </div>
        <div>
            <label for="date" class="block text-sm font-medium">Return Date <span class="text-red-500">*</span></label>
            <input type="date" id="date" name="date" value="{{ date('Y-m-d') }}" crequired class="block w-full mt-1 border-gray-300 rounded">
        </div>
        <div>
            <label for="total_amount" class="block text-sm font-medium text-gray-700">Total Amount</label>
            <input type="number" name="total_amount" id="total_amount" required class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
        </div>
        <div class="mt-6 text-right">
            <button type="submit" class="px-4 py-2 text-white bg-purple-500 rounded-lg shadow-lg hover:bg-pink-600">Submit Return</button>
        </div>
    </div>
    </form>
@endsection