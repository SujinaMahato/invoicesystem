<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Supplier Form</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">

  <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-md">
    <h2 class="mb-6 text-2xl font-bold text-gray-800">Add Supplier Return</h2>

    <!-- Update the form action route to match the correct POST route -->
    <form action="{{ route('submit-form') }}" method="POST" class="space-y-4">
      @csrf
      
      <!-- Supplier Name -->
      <div>
        <label for="supplier_name" class="block text-sm font-medium text-gray-700">Supplier Name</label>
        <!-- Select field for Supplier Name -->
        <select id="supplier_name" name="supplier_name" class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            <option value="">Select Supplier</option>
            @foreach($suppliers as $supplier)
                <option value="{{ $supplier->name }}">{{ $supplier->name }}</option>
            @endforeach
        </select>
    </div>

      <!-- Invoice Number -->
      <div>
        <label for="invoice_number" class="block text-sm font-medium text-gray-700">Invoice Number</label>
        <input type="text" id="invoice_number" name="invoice_number" class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" placeholder="Enter Invoice Number">
      </div>

      <!-- Date -->
      <div>
        <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
        <input type="date" id="date" name="date" class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
      </div>

      <!-- Total Amount -->
      <div>
        <label for="total_amount" class="block text-sm font-medium text-gray-700">Total Amount</label>
        <input type="tel" id="total_amount" name="total_amount" class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" placeholder="Enter Total Amount">
      </div>

      <!-- Submit Button -->
      <div>
        <button type="submit" class="w-full py-2 text-white bg-indigo-600 rounded-md hover:bg-indigo-700">Submit</button>
      </div>

    </form>
  </div>

</body>
</html>