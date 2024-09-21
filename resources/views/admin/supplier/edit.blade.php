@extends('layouts.app')

@section('content')
<div class="flex">
    <!-- Main Content Area -->
    <div class="w-full p-6 lg:w-4/5">

        <!-- Success Message -->
        @if (session('success'))
            <div class="p-4 mb-4 text-purple-700 bg-purple-100 rounded">
                {{ session('success') }}
            </div>
        @endif

        <!-- Edit Supplier Form -->
        <div class="p-6 bg-white rounded-lg shadow-md">
            <h1 class="mb-4 text-xl font-bold">Edit Supplier</h1>

            <form action="{{ route('supplier.update', $supplier->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Supplier Name</label>
                        <input type="text" name="name" value="{{ $supplier->name }}" class="w-full p-2 mt-1 border rounded" required>
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" value="{{ $supplier->email }}" class="w-full p-2 mt-1 border rounded">
                    </div>
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                        <input type="text" name="phone" value="{{ $supplier->phone }}" class="w-full p-2 mt-1 border rounded">
                    </div>
                    <div>
                        <label for="mobile_no" class="block text-sm font-medium text-gray-700">Mobile No</label>
                        <input type="text" name="mobile_no" value="{{ $supplier->mobile_no }}" class="w-full p-2 mt-1 border rounded">
                    </div>
                    <div>
                        <label for="pan_no" class="block text-sm font-medium text-gray-700">PAN No</label>
                        <input type="text" name="pan_no" value="{{ $supplier->pan_no }}" class="w-full p-2 mt-1 border rounded">
                    </div>
                    <div>
                        <label for="address1" class="block text-sm font-medium text-gray-700">Address1</label>
                        <input type="text" name="address1" value="{{ $supplier->address1 }}" class="w-full p-2 mt-1 border rounded">
                    </div>
                    <div>
                        <label for="address2" class="block text-sm font-medium text-gray-700">Address2</label>
                        <input type="text" name="address2" value="{{ $supplier->address2 }}" class="w-full p-2 mt-1 border rounded">
                    </div>
                    <div>
                        <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                        <input type="text" name="city" value="{{ $supplier->city }}" class="w-full p-2 mt-1 border rounded">
                    </div>
                    <div>
                        <label for="state" class="block text-sm font-medium text-gray-700">State</label>
                        <input type="text" name="state" value="{{ $supplier->state }}" class="w-full p-2 mt-1 border rounded">
                    </div>
                    <div>
                        <label for="ward_no" class="block text-sm font-medium text-gray-700">Ward No.</label>
                        <input type="text" name="ward_no" value="{{ $supplier->ward_no }}" class="w-full p-2 mt-1 border rounded">
                    </div>
                </div>

                <div class="flex justify-end mt-6 space-x-4">
                    <button type="submit" class="px-4 py-2 text-white bg-purple-500 rounded hover:bg-purple-600">Update</button>
                    <a href="{{ route('supplier.index') }}" class="px-4 py-2 text-white bg-purple-500 rounded hover:bg-purple-600">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
