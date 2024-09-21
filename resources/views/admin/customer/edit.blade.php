<!-- resources/views/customer/edit.blade.php -->

@extends('layouts.app')

@section('content')
<form action="{{ route('customers.update', $customer->id) }}" method="POST">
    @csrf
    @method('PUT')
    
    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
        <div>
            <label for="customer_name" class="block text-sm font-medium text-gray-700">Customer Name*</label>
            <input type="text" name="customer_name" id="customer_name" value="{{ old('customer_name', $customer->customer_name) }}" required class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email*</label>
            <input type="email" name="email" id="email" value="{{ old('email', $customer->email) }}" required class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
        </div>

        <div>
            <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
            <input type="text" name="phone" id="phone" value="{{ old('phone', $customer->phone) }}" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
        </div>

        <div>
            <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
            <input type="text" name="address" id="address" value="{{ old('address', $customer->address) }}" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
        </div>

        <div>
            <label for="city" class="block text-sm font-medium text-gray-700">City</label>
            <input type="text" name="city" id="city" value="{{ old('city', $customer->city) }}" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
        </div>

        <div>
            <label for="state" class="block text-sm font-medium text-gray-700">State</label>
            <input type="text" name="state" id="state" value="{{ old('state', $customer->state) }}" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
        </div>

        <div>
            <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
            <input type="text" name="country" id="country" value="{{ old('country', $customer->country) }}" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
        </div>

        <div>
            <label for="pan_no" class="block text-sm font-medium text-gray-700">PAN No</label>
            <input type="text" name="pan_no" id="pan_no" value="{{ old('pan_no', $customer->pan_no) }}" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
        </div>

        <div>
            <label for="vat_no" class="block text-sm font-medium text-gray-700">VAT No</label>
            <input type="text" name="vat_no" id="vat_no" value="{{ old('vat_no', $customer->vat_no) }}" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
        </div>

        <div>
            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
            <input type="text" name="status" id="status" value="{{ old('status', $customer->status) }}" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
        </div>

        <div>
            <label for="balance" class="block text-sm font-medium text-gray-700">Balance</label>
            <input type="text" name="balance" id="balance" value="{{ old('balance', $customer->balance) }}" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
        </div>
    </div>

    <div class="mt-6 text-right">
        <button type="submit" class="px-4 py-2 text-white bg-purple-500 rounded-lg shadow-lg hover:bg-pink-600">Update Customer</button>
    </div>
</form>

@endsection
