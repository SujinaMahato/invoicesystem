@extends('layouts.app')

@section('content')
<div class="max-w-4xl p-8 mx-auto mt-4 bg-white rounded-lg shadow-lg">
    <h2 class="mb-6 text-2xl font-semibold">Add Customer</h2>

    <!-- Form -->
    <form action="/add-customer" method="POST">
        @csrf <!-- Token for Laravel form security -->

        <div class="grid grid-cols-2 gap-6">
            <!-- Left Column -->
            <div>
                <label for="customer_name" class="block mb-2 font-semibold">Customer Name*</label>
                <input type="text" name="customer_name" id="customer_name" required class="w-full p-2 border rounded-lg" placeholder="Customer Name">

                <label for="email" class="block mt-4 mb-2 font-semibold">Email</label>
                <input type="email" name="email" id="email" class="w-full p-2 border rounded-lg" placeholder="Email">

                <label for="phone" class="block mt-4 mb-2 font-semibold">Phone</label>
                <input type="tel" name="phone" id="phone" class="w-full p-2 border rounded-lg" placeholder="Phone">

                <label for="address" class="block mt-4 mb-2 font-semibold">Address</label>
                <input type="text" name="address" id="address" class="w-full p-2 border rounded-lg" placeholder="Address">

                <label for="city" class="block mt-4 mb-2 font-semibold">City</label>
                <input type="text" name="city" id="city" class="w-full p-2 border rounded-lg" placeholder="City">
            </div>

            <!-- Right Column -->
            <div>
                <label for="state" class="block mb-2 font-semibold">State</label>
                <input type="text" name="state" id="state" class="w-full p-2 border rounded-lg" placeholder="State">

                <label for="country" class="block mt-4 mb-2 font-semibold">Country</label>
                <input type="text" name="country" id="country" class="w-full p-2 border rounded-lg" placeholder="Country">

                <label for="pan_no" class="block mt-4 mb-2 font-semibold">PAN No</label>
                <input type="text" name="pan_no" id="pan_no" class="w-full p-2 border rounded-lg" placeholder="PAN No">

                <label for="vat_no" class="block mt-4 mb-2 font-semibold">VAT No</label>
                <input type="text" name="vat_no" id="vat_no" class="w-full p-2 border rounded-lg" placeholder="VAT No">

                <label for="status" class="block mt-4 mb-2 font-semibold">Status</label>
                <select id="status" name="status" class="w-full p-2 border rounded-lg">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>

                <label for="balance" class="block mt-4 mb-2 font-semibold">Balance</label>
                <input type="text" name="balance" id="balance" class="w-full p-2 border rounded-lg" placeholder="Balance">
            </div>
        </div>

        <div class="flex justify-between mt-6">
            <div class="text-left">
                <a href="{{ url('/dashboard') }}" class="text-purple-500 hover:text-blue-700">Dashboard</a>
            </div>
            <div class="text-right">
                <button type="submit" class="px-4 py-2 text-white bg-purple-500 rounded-lg shadow-lg hover:bg-purple-600">
                    Save
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
