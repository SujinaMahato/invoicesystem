@extends('layouts.app') <!-- Assuming you have a layout file -->

@section('content')
<div class="container p-4 mx-auto">
    <h1 class="mb-4 text-3xl font-bold">Sales Returns</h1>

    <!-- Link to the form page for creating new sales return -->
    <div class="flex justify-end mt-6 space-x-4">
        <a href="{{ route('sales_returns.create') }}" class="px-4 py-2 text-white bg-purple-500 rounded-md">Add New Sales Return</a>
    </div>
</form>

    <!-- Display the Sales Returns Table -->
    <h2 class="mb-2 text-2xl font-semibold">Returned Sales</h2>
    <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
        <thead>
            <tr class="bg-gray-100">
                <th class="px-4 py-2 border-b">SL</th>
                <th class="px-4 py-2 border-b">Invoice No</th>
                <th class="px-4 py-2 border-b">Customer Name</th>
                <th class="px-4 py-2 border-b">Date</th>
                <th class="px-4 py-2 border-b">Total Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach($salesReturns as $key => $return)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 text-center border-b">{{ $key + 1 }}</td>
                    <td class="px-4 py-2 border-b">{{ $return->invoice_no }}</td>
                    <td class="px-4 py-2 border-b">{{ $return->customer_name }}</td>
                    <td class="px-4 py-2 border-b">{{ $return->date }}</td>
                    <td class="px-4 py-2 text-right border-b">{{ number_format($return->total_amount, 2) }}</td>
                    <td class="px-4 py-2 border">
                        <a href="{{ route('sales_returns.edit', $return->id) }}" class="px-2 py-1 text-white bg-blue-500 rounded-md">Edit</a>
                        <form action="{{ route('sales_returns.destroy', $return->id) }}" method="POST" class="inline-block">

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
@endsection