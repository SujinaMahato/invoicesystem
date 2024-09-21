@extends('layouts.app')
@section('content')
    <!-- Sales Terms List Section -->
    <div class="p-4 bg-white rounded-lg shadow-lg">
        <!-- Header -->
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-xl font-semibold text-gray-800">Sales Terms List</h2>
        </div>

        <!-- Show Entries, Export Buttons, and Search -->
        <div class="flex items-center justify-between mb-4">
            <!-- Show Entries -->
            <div class="flex items-center">
                <label for="entries" class="mr-2 text-gray-700">Show</label>
                <select id="entries" class="p-2 border border-gray-300 rounded-lg">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                </select>
                <span class="ml-2 text-gray-700">entries</span>
            </div>

            <!-- Export Buttons -->
            <div class="flex items-center mx-auto space-x-2">
                <button class="px-2 py-1 text-white bg-purple-500 rounded-lg hover:bg-purple-600">Copy</button>
                <button class="px-2 py-1 text-white bg-purple-500 rounded-lg hover:bg-purple-600">CSV</button>
                <button class="px-2 py-1 text-white bg-purple-500 rounded-lg hover:bg-purple-600">Excel</button>
                <button class="px-2 py-1 text-white bg-purple-500 rounded-lg hover:bg-purple-600">PDF</button>
                <button class="px-2 py-1 text-white bg-purple-500 rounded-lg hover:bg-purple-600">Print</button>
            </div>

            <!-- Search Input -->
           
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">SL.</th>
                        <th class="px-4 py-2 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Terms & Conditions</th>
                        <th class="px-4 py-2 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Status</th>
                        <th class="px-4 py-2 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($saleterms as $saleterm)
                        <tr>
                            <td class="px-4 py-2 text-gray-700">{{$loop->iteration}}</td>
                            <td class="px-4 py-2 text-gray-700">{{$saleterm->terms_and_conditions}}</td>
                            <td class="px-4 py-2 text-gray-700">{{$saleterm->status}}</td>
                            <td class="flex px-4 py-2 space-x-2">
                                <!-- Edit Button -->
                                <a href="{{ route('manage.edit', $saleterm->id) }}" class="flex items-center px-2 py-1 space-x-1 text-white bg-blue-500 rounded-md hover:bg-blue-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                        <path fill-rule="evenodd" d="M4 16a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1z" clip-rule="evenodd" />
                                    </svg>
                                    <span>Edit</span>
                                </a>
                                
                                <!-- Delete Button -->
                                <form action="{{ route('manage.delete', $saleterm->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="flex items-center px-2 py-1 space-x-1 text-white bg-red-400 rounded-md hover:bg-red-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V4a2 2 0 00-2-2H6zm2 2a1 1 0 011 1v8a1 1 0 01-2 0V5a1 1 0 011-1zm4 1a1 1 0 112 0v8a1 1 0 11-2 0V5z" clip-rule="evenodd" />
                                        </svg>
                                        <span>Delete</span>
                                    </button>
                                </form>
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        
    </div>
@endsection
