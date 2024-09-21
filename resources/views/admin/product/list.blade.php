<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    @include('admin.includes.header')
    <!-- Container -->
    <div class="container px-4 py-8 mx-auto">
        <!-- Go Back to Dashboard Link -->
        <div class="flex items-center justify-between mb-6">
            <!-- Any content for going back to dashboard -->
        </div>

        <div class="p-4 bg-white rounded-lg shadow-lg">
            <!-- Header -->
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-sm font-semibold">Manage Product</h2>

                <div class="space-x-2">
                    <a href="{{ route('product.add') }}">
                        <button class="px-4 py-2 text-white bg-blue-400 rounded-lg hover:bg-blue-400">+ Add Product</button>
                    </a>
                </div>
            </div>

            <div class="flex items-center justify-between mb-4">
                <!-- Show entries on the left -->
                <div class="flex items-center">
                    <label for="entries" class="mr-2 text-gray-700">Show</label>
                    <select id="entries" class="p-2 border border-gray-300 rounded-lg">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                    </select>
                    <span class="ml-2 text-gray-700">entries</span>
                </div>

                <!-- Export Buttons in the center -->
                <div class="flex items-center mx-auto space-x-2">
                    <button class="px-2 py-1 text-white bg-purple-500 rounded-lg hover:bg-purple-600">Copy</button>
                    <button class="px-2 py-1 text-white bg-purple-500 rounded-lg hover:bg-purple-600">CSV</button>
                    <button class="px-2 py-1 text-white bg-purple-500 rounded-lg hover:bg-purple-600">Excel</button>
                    <button class="px-2 py-1 text-white bg-purple-500 rounded-lg hover:bg-purple-600">PDF</button>
                    <button class="px-2 py-1 text-white bg-purple-500 rounded-lg hover:bg-purple-600">Print</button>
                </div>

                <!-- Search on the right -->
                <form action="{{ route('product.list') }}" method="GET" class="flex items-center">
                   
                    <input type="text" name="search" id="search" value="{{ request('search') }}" class="p-2 border border-gray-300 rounded-lg">
                    <button type="submit" class="px-4 py-2 ml-2 text-white bg-purple-500 rounded-lg hover:bg-purple-600">Search</button>
                </form>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="w-full border border-collapse border-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 border border-gray-300">SL.</th>
                            <th class="px-4 py-2 border border-gray-300">Product Name</th>
                            <th class="px-4 py-2 border border-gray-300">Product Model</th>
                            <th class="px-4 py-2 border border-gray-300">Supplier Name</th>
                            <th class="px-4 py-2 border border-gray-300">Cost Price</th>
                            <th class="px-4 py-2 border border-gray-300">Sale Price</th>
                            <th class="px-4 py-2 border border-gray-300">Image</th>
                            <th class="px-4 py-2 border border-gray-300">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr class="text-center">
                            <td class="px-4 py-2 border border-gray-300">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2 border border-gray-300">{{ $product->product_name }}</td>
                            <td class="px-4 py-2 border border-gray-300">{{ $product->model }}</td>
                            <td class="px-4 py-2 border border-gray-300">{{ $product->supplier->name }}</td> <!-- Assuming supplier name is available -->
                            <td class="px-4 py-2 border border-gray-300">{{ $product->cost_price }}</td>
                            <td class="px-4 py-2 border border-gray-300">{{ $product->sale_price }}</td>

                           
                        
                            <td class="flex items-center justify-center px-4 py-2 border border-gray-300">
                                @if ($product->image)
                                    <img src="{{ asset('uploads/' . $product->image) }}" alt="Product Image" class="object-cover w-16 h-16">
                                @else
                                    <p>No Image Available</p>
                                @endif
                            </td>
                            
                            <td class="px-4 py-2 border border-gray-300">
                                <!-- Edit Button -->
                                <a href="{{ route('product.edit', $product->id) }}" class="px-2 py-1 text-white bg-blue-500 rounded-lg hover:bg-blue-600">
                                    Edit
                                </a>
                            
                                <!-- Space between buttons -->
                                <span class="mx-2"></span> <!-- You can adjust the margin as needed -->
                            
                                <!-- Delete Button -->
                                <form action="{{ route('product.delete', $product->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-2 py-1 text-white bg-red-400 rounded-lg hover:bg-red-500">
                                        Delete
                                    </button>
                                </form>
                            </td>
                            
                            
                                
                                                 

                           
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
