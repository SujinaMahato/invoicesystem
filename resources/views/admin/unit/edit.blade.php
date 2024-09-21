<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    @include('admin.includes.header')
    <div class="container px-4 py-8 mx-auto">
        <h2 class="mb-4 text-2xl font-bold">Edit Unit</h2>

        <form action="{{ route('unit.update', $unit->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Unit Name</label>
                <input type="text" id="name" name="name" value="{{ old('name', $unit->name) }}" class="block w-full p-2 mt-1 border border-gray-300 rounded-lg" required>
                @error('name')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <select id="status" name="status" class="block w-full p-2 mt-1 border border-gray-300 rounded-lg" required>
                    <option value="active" {{ old('status', $unit->status) === 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ old('status', $unit->status) === 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
                @error('status')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <a href="{{route('unit.store')}}" class="text-purple-500 hover:text-blue-700">Back to List</a>
                <button type="submit" class="px-4 py-2 text-white bg-purple-500 rounded-lg hover:bg-purple-600">Update Category</button>
            </div>
        </form>
    </div>
</body>
</html>
