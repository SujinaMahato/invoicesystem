<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Supplier Return</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="p-8 bg-gray-100">

  <!-- Main container -->
  <div class="space-y-4">
    
    <!-- Add Supplier Return Button aligned to the right -->
    <div class="flex justify-end">
      <a href="{{ route('supplier-return.form') }}" class="px-4 py-2 text-white bg-purple-500 rounded hover:bg-purple-600">
        <i class="mr-2 fas fa-plus"></i> Add Supplier Return
      </a>
    </div>

    <!-- Supplier Return Section -->
    <div class="p-6 bg-white rounded-lg shadow-md">
      <!-- Flex container to align title and Print button -->
      <div class="flex items-center justify-between mb-4">
        <h2 class="text-lg font-semibold">Supplier Return</h2>
       
      </div>

      <!-- Table for Supplier Return -->
      <table class="w-full text-left border-collapse table-auto">
        <thead>
          <tr>
            <th class="px-4 py-2 border">S.N</th>
            <th class="px-4 py-2 border">Invoice Number</th>
            <th class="px-4 py-2 border">Supplier Name</th>
            <th class="px-4 py-2 border">Date</th>
            <th class="px-4 py-2 border">Total Amount</th>
            <th class="px-4 py-2 border">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($supplierReturns as $supplierReturn)
          <tr>
              <!-- Display data in table cells -->
              <td class="px-4 py-2 border">{{ $loop->iteration }}</td>
              <td class="px-4 py-2 border">
                  <form action="{{ route('supplier-return.update', $supplierReturn->id) }}" method="POST">
                      @csrf
                      <input type="text" name="invoice_number" value="{{ $supplierReturn->invoice_number }}" class="w-full p-1 border">
              </td>
              <td class="px-4 py-2 border">
                      <input type="text" name="supplier_name" value="{{ $supplierReturn->supplier_name }}" class="w-full p-1 border">
              </td>
              <td class="px-4 py-2 border">
                      <input type="date" name="date" value="{{ $supplierReturn->date }}" class="w-full p-1 border">
              </td>
              <td class="px-4 py-2 border">
                      <input type="text" name="total_amount" value="{{ $supplierReturn->total_amount }}" class="w-full p-1 border">
              </td>
              <td class="px-4 py-2 border">
                <a href="{{ route('supplier-return.edit', $supplierReturn->id) }}" class="px-4 py-1 text-white bg-blue-500 rounded">Edit</a>
                  </form>
                  <!-- Delete button in a separate form -->
                  <form action="{{ route('supplier-return.delete', $supplierReturn->id) }}" method="POST" style="display:inline-block;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="px-4 py-1 text-white bg-red-500 rounded">Delete</button>
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