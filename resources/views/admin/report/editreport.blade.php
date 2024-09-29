<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Supplier Return</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="p-8 bg-gray-100">

  <!-- Main container -->
  <div class="space-y-4">

    <!-- Back to Supplier Return Button -->
    <div class="flex justify-start">
      <a href="{{ route('supplier-return') }}" class="px-4 py-2 text-white bg-purple-500 rounded hover:bg-purple-600">
        <i class="mr-2 fas fa-arrow-left"></i> Back to Supplier Returns
      </a>
    </div>

    <!-- Edit Supplier Return Section -->
    <div class="p-6 bg-white rounded-lg shadow-md">
      <!-- Form Title -->
      <h2 class="mb-4 text-lg font-semibold">Edit Supplier Return</h2>

      <!-- Form to Edit Supplier Return -->
      <form action="{{ route('supplier-return.update', $supplierReturn->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Supplier Name Input -->
        <div class="mb-4">
            <label for="supplier_name" class="block text-sm font-medium text-gray-700">Supplier Name</label>
            <select id="supplier_name" name="supplier_name" class="w-full p-2 border rounded" required>
              <option value="" disabled>Select Supplier</option>
          
              <!-- Loop through the suppliers array -->
              @foreach($suppliers as $supplier)
                <option value="{{ $supplier->name }}" {{ old('supplier_name', $supplierReturn->supplier_name) == $supplier->name ? 'selected' : '' }}>
                  {{ $supplier->name }}
                </option>
              @endforeach
            </select>
          
            @error('supplier_name')
            <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
          </div>
          

        <!-- Invoice Number Input -->
        <div class="mb-4">
          <label for="invoice_number" class="block text-sm font-medium text-gray-700">Invoice Number</label>
          <input type="text" id="invoice_number" name="invoice_number" value="{{ old('invoice_number', $supplierReturn->invoice_number) }}" class="w-full p-2 border rounded" required>
          @error('invoice_number')
          <span class="text-sm text-red-500">{{ $message }}</span>
          @enderror
        </div>

        <!-- Date Input -->
        <div class="mb-4">
          <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
          <input type="date" id="date" name="date" value="{{ old('date', $supplierReturn->date) }}" class="w-full p-2 border rounded" required>
          @error('date')
          <span class="text-sm text-red-500">{{ $message }}</span>
          @enderror
        </div>

        <!-- Total Amount Input -->
        <div class="mb-4">
          <label for="total_amount" class="block text-sm font-medium text-gray-700">Total Amount</label>
          <input type="text" id="total_amount" name="total_amount" value="{{ old('total_amount', $supplierReturn->total_amount) }}" class="w-full p-2 border rounded" required>
          @error('total_amount')
          <span class="text-sm text-red-500">{{ $message }}</span>
          @enderror
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end">
          <button type="submit" class="px-4 py-2 text-white bg-purple-500 rounded hover:bg-purple-600">
            <i class="fas fa-save"></i> Update Supplier Return
          </button>
        </div>
      </form>
    </div>

  </div>

</body>
</html>
