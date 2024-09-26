<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">

    <div class="absolute top-0 left-0 right-0">
        @include('admin.includes.menubar')
    </div>


    <div class="w-full max-w-md p-8 bg-white rounded-lg shadow-lg">
        <h2 class="mb-6 text-2xl font-bold text-center">Add Category</h2>

        <!-- Category Name -->
        <div class="mb-4">
            <label for="category-name" class="block mb-2 text-sm font-bold text-gray-700">
                Category Name <span class="text-red-500">*</span>
            </label>
            <input 
                id="category-name" 
                type="text" 
                placeholder="Category Name" 
                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
                required
            />
        </div>

        <!-- Status -->
        <div class="mb-6">
            <label for="status" class="block mb-2 text-sm font-bold text-gray-700">
                Status <span class="text-red-500">*</span>
            </label>
            <select 
                id="status" 
                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none "
            >
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>

        <!-- Buttons -->
        <div class="flex justify-between space-x-4">
            <button class="px-4 py-2 text-white transition duration-300 bg-purple-600 rounded-lg hover:bg-purple-700">
                Save
            </button>
            <button class="px-4 py-2 text-white transition duration-300 bg-purple-600 rounded-lg hover:bg-purple-700">
                Save and Add Another
            </button>
        </div>
    </div>

</body>
</html>
Route::resource('purchase', PurchaseController::class);
/*Route::get('/add-purchase', function () {
    return view('admin.purchase.add-purchase');
});*/