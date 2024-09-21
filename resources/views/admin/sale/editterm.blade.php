@extends('layouts.app')

@section('content')
    <!-- Navbar Placeholder -->
    <div class="p-4 bg-white shadow">
        <h1 class="text-2xl font-bold"></h1>
    </div>

    <!-- Main Form Section -->
    <div class="container px-4 mx-auto mt-8">
        <div class="w-full p-8 bg-white rounded-lg shadow-lg">
            <div class="flex items-center justify-between mb-4">
                <!-- Title -->
                <h2 class="text-xl font-semibold">Edit Sales Terms</h2>
                
                <!-- Go Back to Dashboard Button -->
                <a href="/dashboard" class="px-4 py-2 text-white transition duration-300 bg-purple-500 rounded hover:bg-purple-600">
                    Go Back
                </a>
            </div>

            <form action="{{ route('manage.update', $saleterm->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Terms and Conditions -->
                <div class="mb-4">
                    <label for="terms_and_conditions" class="block mb-1 text-sm font-semibold text-gray-700">
                        Terms and Conditions<span class="text-red-500">*</span>
                    </label>
                    <input 
                        id="terms_and_conditions" 
                        name="terms_and_conditions"
                        type="text" 
                        placeholder="Enter terms and conditions" 
                        class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none"
                        value="{{ old('terms_and_conditions', $saleterm->terms_and_conditions) }}" 
                        required
                    />
                </div>

                <!-- Status -->
                <div class="mb-6">
                    <label for="status" class="block mb-1 text-sm font-semibold text-gray-700">
                        Status <span class="text-red-500">*</span>
                    </label>
                    <select 
                        id="status" 
                        name="status"
                        class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none"
                    >
                        <option value="active" {{ old('status', $saleterm->status) == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ old('status', $saleterm->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <!-- Buttons -->
                <div class="flex justify-start space-x-4">
                    <button type="submit" class="px-4 py-2 text-white transition duration-300 bg-purple-500 rounded hover:bg-purple-700">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
