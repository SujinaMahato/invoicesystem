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

        <!-- Supplier List Table -->
        <div class="p-6 bg-white rounded-lg shadow-md">
            <div class="flex justify-between mb-4">
                <h1 class="text-xl font-bold">Supplier List</h1>
                <a href="{{url('/addsupplier')}}">
                    <button type="button" class="p-2 border border-gray-300 rounded">Go Back</button>
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead class="text-sm leading-normal text-gray-600 uppercase bg-gray-200">
                        <tr>
                            <td class="px-6 py-3 text-left">Sl</td>
                            <th class="px-4 py-2 border border-gray-200">Supplier Name</th>
                            <th class="px-4 py-2 border border-gray-200">Email</th>
                            <th class="px-4 py-2 border border-gray-200">Phone</th>
                            <th class="px-4 py-2 border border-gray-200">Mobile No</th>
                            <th class="px-4 py-2 border border-gray-200">PAN No</th>
                            <th class="px-4 py-2 border border-gray-200">Address1</th>
                            <th class="px-4 py-2 border border-gray-200">Address2</th>
                            <th class="px-4 py-2 border border-gray-200">City</th>
                            <th class="px-4 py-2 border border-gray-200">State</th>
                            <th class="px-4 py-2 border border-gray-200">Ward No.</th>
                            <th class="px-4 py-2 border border-gray-200">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm text-gray-600">
                        @foreach ($suppliers as $supplier)
                                <td class="px-6 py-3 text-left">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-2 border">{{ $supplier->name }}</td>
                                    <td class="px-4 py-2 border">{{ $supplier->email }}</td>
                                    <td class="px-4 py-2 border">{{ $supplier->phone }}</td>
                                    <td class="px-4 py-2 border">{{ $supplier->mobile_no }}</td>
                                    <td class="px-4 py-2 border">{{ $supplier->pan_no }}</td>
                                    <td class="px-4 py-2 border">{{ $supplier->address1 }}</td>
                                    <td class="px-4 py-2 border">{{ $supplier->address2 }}</td>
                                    <td class="px-4 py-2 border">{{ $supplier->city }}</td>
                                    <td class="px-4 py-2 border">{{ $supplier->state }}</td>
                                    <td class="px-4 py-2 border">{{ $supplier->ward_no }}</td>
                                    <td class="flex px-4 py-2 space-x-2 border">
                                        <a href="{{ route('supplier.edit', $supplier->id) }}" class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-600">Edit</a>


                                        <form action="{{ route('supplier.destroy', $supplier->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this supplier?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-4 py-2 font-bold text-white bg-red-500 rounded hover:bg-red-600">Delete</button>
                                        </form>
                                    </td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

           
        </div>
    </div>
</div>

@endsection
