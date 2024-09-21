<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    @include('admin.includes.header')
    <!-- Container -->
    <div class="container px-4 py-8 mx-auto">
        <!-- Go Back to Product List Link -->
        <div class="flex items-center justify-between mb-6">
            <a href="{{ route('product.list') }}" class="text-purple-500 hover:underline">&larr; Back to Product List</a>
        </div>

        <div class="p-6 bg-white rounded-lg shadow-lg">
            <!-- Header -->
            <div class="mb-4">
                <h2 class="text-4xl font-bold">Edit Product</h2>
            </div>

            <!-- Edit Form -->
            <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label for="product_name" class="block text-sm font-medium text-gray-700">Product Name *</label>
                        <input type="text" name="product_name" id="product_name" value="{{ old('product_name', $product->product_name) }}" class="block w-full px-4 py-3 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-lg" required>
                    </div>

                    <div>
                        <label for="model" class="block text-sm font-medium text-gray-700">Model</label>
                        <input type="text" name="model" id="model" value="{{ old('model', $product->model) }}" class="block w-full px-4 py-3 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-lg">
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label for="supplier" class="block text-sm font-medium text-gray-700">Supplier *</label>
                        <select name="supplier_id" id="supplier" class="block w-full px-4 py-3 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-lg" required>
                            <option value="">Select Supplier</option>
                            @foreach($suppliers as $supplier)
                                <option value="{{ $supplier->id }}" {{ $supplier->id == $product->supplier_id ? 'selected' : '' }}>{{ $supplier->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="cost_price" class="block text-sm font-medium text-gray-700">Cost Price</label>
                        <input type="number" name="cost_price" id="cost_price" value="{{ old('cost_price', $product->cost_price) }}" class="block w-full px-4 py-3 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-lg" step="0.01">
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label for="sale_price" class="block text-sm font-medium text-gray-700">Sale Price</label>
                        <input type="number" name="sale_price" id="sale_price" value="{{ old('sale_price', $product->sale_price) }}" class="block w-full px-4 py-3 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-lg" step="0.01">
                    </div>
                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                        <input type="file" name="image" id="image" class="block w-full px-4 py-3 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-lg">
                        @if ($product->image)
                            <div class="mt-2">
                                <img src="{{ asset('uploads/' . $product->image) }}" alt="Current Product Image" class="object-cover w-16 h-16">
                                <p class="text-sm text-gray-500">{{ $product->image }}</p> <!-- Displaying the filename -->
                            </div>
                        @endif
                    </div>
                    
                    
                </div>

                <div class="mb-4">
                    <label for="details" class="block text-sm font-medium text-gray-700">Product Details</label>
                    <textarea name="details" id="details" class="block w-full px-4 py-3 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-lg">{{ old('details', $product->details) }}</textarea>
                </div>

                <div class="flex justify-end mb-4 space-x-4">
                    <button type="submit" class="px-6 py-3 text-white bg-purple-500 rounded-lg hover:bg-purple-600">Update Product</button>
                    <a href="{{ route('product.list') }}" class="px-6 py-3 text-white bg-gray-500 rounded-lg hover:bg-gray-600">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
