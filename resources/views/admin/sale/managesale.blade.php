@extends('layouts.app')
@section('content')
<div class="p-8 bg-white rounded-lg shadow-md">
    <h1 class="mb-6 text-2xl font-bold">Manage Sale</h1>

    <!-- Filter by Date Range -->
    <form method="GET" action="{{ route('sale.index') }}" class="mb-6">
       
         <!-- Action Buttons -->
         <div class="flex justify-end mt-6 space-x-4">
            <a href="{{ route('sale.create') }}" class="px-4 py-2 text-white bg-purple-500 rounded-md">+ New Sale</a>
        </div>
    </form>

    <!-- Sale List Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border">SL</th>
                    <th class="px-4 py-2 border">Invoice No</th>
                    <th class="px-4 py-2 border">Customer Name</th>
                    <th class="px-4 py-2 border">Product Name</th>
                    <th class="px-4 py-2 border">Date</th>
                    <th class="px-4 py-2 border">Total Amount</th>
                    <th class="px-4 py-2 border">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sales as $sale)
                    <tr>
                        <td class="px-4 py-2 border">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2 border">{{ $sale->id }}</td>
                        <td class="px-4 py-2 border">{{ $sale->customer->customer_name }}</td>
                        <td class="px-4 py-2 border">{{ $sale->product_name }}</td>
                        <td class="px-4 py-2 border">{{ $sale->date }}</td>
                        <td class="px-4 py-2 border">{{ number_format($sale->total, 2) }}</td>
                        <td class="px-4 py-2 border">
                            <a href="{{ route('sale.edit', $sale->id) }}" class="px-2 py-1 text-white bg-blue-500 rounded-md">Edit</a>
                            <form action="{{ route('sale.destroy', $sale->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-2 py-1 text-white bg-red-500 rounded-md">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

     
    </div>
</div>
@endsection