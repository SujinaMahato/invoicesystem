<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
@include('admin.includes.header')
    <!-- Navbar Placeholder -->
    <div class="p-4 bg-white shadow">
        <h1 class="text-2xl font-bold"></h1>
    </div>

    <!-- Main Form Section -->
    <div class="container px-4 mx-auto mt-8">
        <div class="w-full p-8 bg-white rounded-lg shadow-lg">
            <div class="flex items-center justify-between mb-4">
                <!-- Title -->
                <h2 class="text-xl font-semibold">Add Unit</h2>
                
                <!-- Go Back to Dashboard Button -->
                <a href="/dashboard" class="px-4 py-2 text-white transition duration-300 bg-purple-500 rounded hover:bg-purple-600">
                    Go Back
                </a>
            </div>

            <form action="{{ route('unit.store') }}" method="POST">
                @csrf

                <!-- Category Name -->
                <div class="mb-4">
                    <label for="unit-name" class="block mb-1 text-sm font-semibold text-gray-700">
                        Unit Name <span class="text-red-500">*</span>
                    </label>
                    <input 
                        id="unit-name" 
                        name="name"
                        type="text" 
                        placeholder="unit Name" 
                        class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none "
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
                        class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none "
                    >
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>

                <!-- Buttons -->
                <div class="flex justify-start space-x-4">
                    <button type="submit" class="px-4 py-2 text-white transition duration-300 bg-purple-600 rounded hover:bg-purple-700">
                        Save
                    </button>
                    <button type="submit" name="save_and_add_another" value="1" class="px-4 py-2 text-white transition duration-300 bg-purple-600 rounded hover:bg-purple-700">
                        Save And Add Another
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
