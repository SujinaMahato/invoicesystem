@extends('layouts.app')

@section('content')
<div class="container p-6 mx-auto">
    <div class="p-4 bg-white rounded-md shadow">
        <h1 class="mb-4 text-xl font-bold">Manage Purchases</h1>

        <!-- Add Purchase Button -->
        <div class="flex justify-end">
            <a href="{{ route('purchases.create') }}" class="px-4 py-2 mb-4 text-white bg-purple-500 rounded hover:bg-purple-600">
                Add Purchase
            </a>
        </div>
        
        <!-- Display Success Message -->
        @if(session('success'))
            <div class="p-4 mb-4 text-white bg-purple-500 rounded">
                {{ session('success') }}
            </div>
        @endif

        <!-- Purchases Table -->
        <table class="min-w-full bg-white border">
            <thead>
                <tr class="text-sm leading-normal text-gray-600 uppercase bg-gray-200">
                    <th class="px-6 py-3 text-left">SL</th>
                    <th class="px-6 py-3 text-left">Chalan No</th>
                    
                    <th class="px-6 py-3 text-left">Supplier Name</th> <!-- Added Supplier Name -->
                    <th class="px-6 py-3 text-left">Purchase Date</th> <!-- Added Purchase Date -->
                    <th class="px-6 py-3 text-left">Product</th>
                    <th class="px-6 py-3 text-left">Quantity</th>
                    <th class="px-6 py-3 text-left">Rate</th>
                    <th class="px-6 py-3 text-left">Discount</th>
                    <th class="px-6 py-3 text-left">Grand Total</th>
                    <th class="px-6 py-3 text-left">Payment Type</th>
                    <th class="px-6 py-3 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="text-sm text-gray-600">
                @forelse($purchases as $purchase)
                    <tr class="border-b">
                        <td class="px-6 py-3">{{ $loop->iteration }}</td>
                        <td class="px-6 py-3">{{ $purchase->chalan_no }}</td>
                        
                        <td class="px-6 py-3">{{ $purchase->supplier->name }}</td> <!-- Display Supplier Name -->
                        <td class="px-6 py-3">{{ $purchase->purchase_date }}</td> <!-- Display Purchase Date -->
                        <td class="px-6 py-3">{{ $purchase->product_name }}</td>
                        <td class="px-6 py-3">{{ $purchase->quantity }}</td>
                        <td class="px-6 py-3">{{ $purchase->rate }}</td>
                        <td class="px-6 py-3">{{ $purchase->discount_percentage ?? 0 }}%</td>
                        <td class="px-6 py-3">{{ $purchase->grand_total }}</td>
                        <td class="px-6 py-3">{{ ucfirst($purchase->payment_type) }}</td>
                        <td class="px-6 py-3 text-center">
                            <div class="flex items-center"> <!-- Use flexbox for alignment -->
                                <!-- Edit Button -->
                                <a href="{{ route('purchases.edit', $purchase->id) }}" 
                                   class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
                                    Edit
                                </a>
                        
                                <!-- Delete Button -->
                                <form action="{{ route('purchases.destroy', $purchase->id) }}" method="POST" style="display:inline-block; margin-left: 10px;"> <!-- Add margin for gap -->
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-4 py-2 font-bold text-white bg-red-500 rounded hover:bg-red-700"
                                            onclick="return confirm('Are you sure you want to delete this purchase?')">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                        
                    </tr>
                @empty
                    <tr>
                        <td colspan="12" class="px-6 py-3 text-center">No purchases found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
