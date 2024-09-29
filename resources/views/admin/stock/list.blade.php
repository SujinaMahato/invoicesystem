<!-- resources/views/admin/stock/list.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container p-6 mx-auto">
        <h2 class="mb-4 text-2xl font-bold">Stock List</h2>

        @if (session('success'))
            <div class="p-4 mb-4 text-white bg-green-500 rounded">
                {{ session('success') }}
            </div>
        @endif
        <div class="flex justify-between mb-4">
            <!-- Dashboard Button on the left -->
            <a href="{{ url('dashboard') }}" class="inline-block px-4 py-2 text-white bg-purple-600 rounded hover:bg-purple-700">
                Dashboard
            </a>
        
            <!-- Add New Stock Button on the right -->
            <a href="{{ route('stocks.add') }}" class="inline-block px-4 py-2 text-white bg-purple-500 rounded hover:bg-purple-600">
                Add New Stock
            </a>
        </div>
        

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr class="text-sm text-gray-600 uppercase bg-gray-200">
                        <th class="px-4 py-3 text-left">SL</th>
                        <th class="px-4 py-3 text-left">Product Name</th>
                        <th class="px-4 py-3 text-left">Stock Quantity</th>
                        <th class="px-4 py-3 text-left">Status</th>
                        <th class="px-4 py-3 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach ($stocks as $index => $stock)
                        <tr class="hover:bg-gray-100">
                            <td class="px-4 py-3 border-t">{{ $index + 1 }}</td>
                            <td class="px-4 py-3 border-t">{{ $stock->product->product_name }}</td>
                            <td class="px-4 py-3 border-t">{{ $stock->quantity }}</td>
                            <td class="px-4 py-3 border-t">{{ $stock->status === 'active' ? 'Available' : 'Out of Stock' }}</td>
                            <td class="px-4 py-3 border-t">
                                <a href="{{ route('stocks.edit', $stock->id) }}" class="text-blue-500">Edit</a>
                                <form action="{{ route('stocks.delete', $stock->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="ml-4 text-red-500 hover:text-red-700" onclick="return confirm('Are you sure you want to delete this stock?');">Delete</button>
                                </form>
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
