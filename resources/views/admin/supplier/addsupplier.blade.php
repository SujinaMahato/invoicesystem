@extends('layouts.app')

@section('content')
<!-- Add Supplier Form -->
<div class="max-w-4xl p-8 mx-auto mt-4 bg-white rounded-lg shadow-lg">
    <h2 class="mb-6 text-2xl font-semibold">Add Supplier</h2>

    <!-- Form -->
    <form action="{{ route('supplier.store') }}" method="POST">
        @csrf <!-- Token for Laravel form security -->

        <div class="grid grid-cols-2 gap-6">
            <!-- Left Column -->
            <div>
                <label class="block mb-2 font-semibold" for="supplierName">Supplier Name *</label>
                <input type="text" id="supplierName" name="name" class="w-full p-2 border rounded-lg" placeholder="Supplier Name" required>

                <label class="block mt-4 mb-2 font-semibold" for="email">Email Address</label>
                <input type="email" id="email" name="email" class="w-full p-2 border rounded-lg" placeholder="Email">

                <label class="block mt-4 mb-2 font-semibold" for="phone">Phone</label>
                <input type="tel" id="phone" name="phone" class="w-full p-2 border rounded-lg" placeholder="Phone">

                <label class="block mt-4 mb-2 font-semibold" for="address1">Address1</label>
                <input type="text" id="address1" name="address1" class="w-full p-2 border rounded-lg" placeholder="Address1">

                <label class="block mt-4 mb-2 font-semibold" for="ward_no">Ward No.</label>
                <input type="tel" id="ward_no" name="ward_no" class="w-full p-2 border rounded-lg" placeholder="Ward No.">
            </div>

            <!-- Right Column -->
            <div>
                <label class="block mb-2 font-semibold" for="mobileNo">Mobile No</label>
                <input type="tel" id="mobileNo" name="mobile_no" class="w-full p-2 border rounded-lg" placeholder="Mobile No">

                <label class="block mt-4 mb-2 font-semibold" for="panNo">PAN No</label>
                <input type="tel" id="panNo" name="pan_no" class="w-full p-2 border rounded-lg" placeholder="PAN NO">

                <label class="block mt-4 mb-2 font-semibold" for="address2">Address2</label>
                <input type="text" id="address2" name="address2" class="w-full p-2 border rounded-lg" placeholder="Address2">

                <label class="block mt-4 mb-2 font-semibold" for="city">City</label>
                <input type="text" id="city" name="city" class="w-full p-2 border rounded-lg" placeholder="City">

                <label class="block mt-4 mb-2 font-semibold" for="state">State</label>
                <input type="text" id="state" name="state" class="w-full p-2 border rounded-lg" placeholder="State">
            </div>
        </div>

        <div class="flex justify-between mt-6">
            <div class="text-left">
                <a href="{{url('/dashboard')}}" class="text-purple-500 hover:text-blue-700">Dashboard</a>
            </div>
            <div class="text-right">
                <button type="submit" class="px-4 py-2 text-white bg-purple-500 rounded-lg shadow-lg hover:bg-pink-600">
                    Save
                </button>
            </div>
        </div>
    </form>
</div>
@endsection

