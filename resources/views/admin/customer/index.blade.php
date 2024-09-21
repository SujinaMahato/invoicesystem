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

        <!-- Customer List Table -->
        <a href="{{ route('customers.index') }}"></a>

        <div class="p-6 bg-white rounded-lg shadow-md">
            <div class="flex justify-between mb-4">
                <h1 class="text-xl font-bold">Customer List</h1>
                <a href="{{url('/dashboard')}}">
                <button type="button" class="p-2 border border-gray-300 rounded" placeholder="">Go Back</button>
            </a>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead class="text-sm leading-normal text-gray-600 uppercase bg-gray-200">
                        <tr>
                            <th class="px-4 py-2 border border-gray-200">SL</th>
                <th class="px-4 py-2 border border-gray-200">Customer Name</th>
                <th class="px-4 py-2 border border-gray-200">Email</th>
                <th class="px-4 py-2 border border-gray-200">Phone</th>
                <th class="px-4 py-2 border border-gray-200">Address</th>
                <th class="px-4 py-2 border border-gray-200">City</th>
                <th class="px-4 py-2 border border-gray-200">State</th>
                <th class="px-4 py-2 border border-gray-200">VAT NO</th>
                <th class="px-4 py-2 border border-gray-200">Status</th>
                <th class="px-4 py-2 border border-gray-200">PAN No</th>
                <th class="px-4 py-2 border border-gray-200">Country</th>
                <th class="px-4 py-2 border border-gray-200">Balance</th>
                <th class="px-4 py-2 border border-gray-200">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm text-gray-600">
                        @foreach ($customers as $customer)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="px-6 py-3 text-left">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2 border border-gray-200">{{ $customer->customer_name }}</td>
                            <td class="px-4 py-2 border border-gray-200">{{ $customer->email }}</td>
                            <td class="px-4 py-2 border border-gray-200">{{ $customer->phone}}</td>
                            <td class="px-4 py-2 border border-gray-200">{{ $customer->address}}</td>
                            <td class="px-4 py-2 border border-gray-200">{{ $customer->city}}</td>
                            <td class="px-4 py-2 border border-gray-200">{{ $customer->state}}</td>
                            <td class="px-4 py-2 border border-gray-200">{{ $customer->vat_no }}</td>
                            <td class="px-4 py-2 border border-gray-200">{{ $customer->status}}</td>
                            <td class="px-4 py-2 border border-gray-200">{{ $customer->pan_no }}</td>
                            <td class="px-4 py-2 border border-gray-200">{{ $customer->country }}</td>
                            <td class="px-4 py-2 border border-gray-200">{{ $customer->balance }}</td>
                            
                            <td class="flex px-4 py-2 space-x-2 border border-gray-200">

                                    <!-- Edit Button -->
                                    <a href="{{ route('customers.edit', $customer->id) }}" 
                                     class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
                                     Edit
                                    </a>
                                    <!-- Delete buttons -->
                                    <form action="{{ route('customers.destroy', $customer->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-4 py-2 font-bold text-white bg-red-500 rounded hover:bg-red-700">
                                            Delete
                                        </button>
                           </form>
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-4">
                {{ $customers->links() }}
            </div>
        </div>
    </div>
</div>
@endsection



