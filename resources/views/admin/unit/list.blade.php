<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category List</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    @include('admin.includes.header')
    <!-- Container -->
    <div class="container px-4 py-8 mx-auto">
        <!-- Go Back to Dashboard Link -->
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Manage Unit</h2>
            <a href="/add" class="text-sm text-purple-600 transition hover:text-purple-800">
                 Go Back
            </a>
        </div>

        <!-- Table -->
        <div class="p-6 bg-white rounded-lg shadow-md">
            <table class="min-w-full bg-white border rounded-lg">
                <!-- Table Head -->
                <thead class="text-white bg-purple-500">
                    <tr>
                        <th class="px-6 py-3 text-sm font-semibold text-left">SL</th>
                        <th class="px-6 py-3 text-sm font-semibold text-left">Unit Name</th>
                        <th class="px-6 py-3 text-sm font-semibold text-left">Status</th>
                        <th class="px-6 py-3 text-sm font-semibold text-left">Action</th>
                    </tr>
                </thead>

                <!-- Table Body -->
                <tbody class="divide-y divide-gray-200">
                    @foreach ($units as $index => $unit)
                    <tr>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $index + 1 }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $unit->name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ ucfirst($unit->status) }}</td>
                        <td class="px-6 py-4 text-sm">
                            <!-- Action Buttons -->
                            <a href="{{ route('unit.edit', $unit->id) }}" class="inline-block px-2 py-1 text-white transition bg-blue-500 rounded hover:bg-blue-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="inline w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 11l3.536-3.536m-3.536 9h.01m-.01 0H5.879l-2 2V17m0-6h.01M17 7v10m4 4h-4m-2-2V7m2-2V5H7" />
                                </svg> 
                                Edit
                            </a>

                            <form action="{{ route('unit.destroy', $unit->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-2 py-1 text-white transition bg-red-500 rounded hover:bg-red-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="inline w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 13H5v-2h14v2zm2-10H3v18h18V3z" />
                                    </svg> 
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
</body>
</html>
