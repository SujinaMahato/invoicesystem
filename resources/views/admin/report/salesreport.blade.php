<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- FontAwesome CDN for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <title>Sales Dashboard</title>
  <style>
    /* Custom hover effects for buttons */
    .hover-card:hover {
      transform: scale(1.05);
      box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>

<body class="bg-gray-100">

  <div class="p-6 mx-auto space-y-8 max-w-7xl">
    
    <!-- First Section: Stats cards (Cover full width with spacing) -->
    <div class="grid grid-cols-1 gap-4 lg:grid-cols-4">
      
      <!-- Total Customers -->
      <div class="p-6 bg-white rounded-lg shadow-md">
        <h3 class="text-xl font-bold">Total Customers</h3>
        <p class="text-4xl text-green-500">141</p>
      </div>

      <!-- Total Products -->
      <div class="p-6 bg-white rounded-lg shadow-md">
        <h3 class="text-xl font-bold">Total Products</h3>
        <p class="text-4xl text-blue-500">126</p>
      </div>

      <!-- Total Suppliers -->
      <div class="p-6 bg-white rounded-lg shadow-md">
        <h3 class="text-xl font-bold">Total Suppliers</h3>
        <p class="text-4xl text-purple-500">30</p>
      </div>

      <!-- Total Invoices -->
      <div class="p-6 bg-white rounded-lg shadow-md">
        <h3 class="text-xl font-bold">Total Invoices</h3>
        <p class="text-4xl text-red-500">138</p>
      </div>
    </div>

    <!-- Second Section: Action Buttons with icons (Added gaps and even distribution) -->
    <div class="grid grid-cols-1 gap-6 mt-10 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-6">
      
      <!-- Add Product Button -->
      <div class="flex items-center p-6 transition-all duration-200 transform bg-white rounded-lg shadow-md hover-card">
        <div class="p-4 text-white bg-teal-500 rounded-full">
          <i class="fas fa-plus fa-2x"></i>
        </div>
        <div class="ml-4">
         <a href="{{url('add-product')}}"> <h3 class="text-sm text-gray-500">Add Product</h3></a>
        </div>
      </div>

      <!-- Add Customer Button -->
      <div class="flex items-center p-6 transition-all duration-200 transform bg-white rounded-lg shadow-md hover-card">
        <div class="p-4 text-white bg-pink-500 rounded-full">
          <i class="fas fa-user-plus fa-2x"></i>
        </div>
        <div class="ml-4">
        <a href="{{url('/add-customer')}}">
          <h3 class="text-sm text-gray-500">Add Customer</h3>
        </a>
        </div>
      </div>

      <!-- Sales Report Button -->
      <div class="flex items-center p-6 transition-all duration-200 transform bg-white rounded-lg shadow-md hover-card">
        <div class="p-4 text-white bg-orange-500 rounded-full">
          <i class="fas fa-chart-line fa-2x"></i>
        </div>
        <div class="ml-4">
          <a href="{{url('sale')}}">
          <h3 class="text-sm text-gray-500">Sales Report</h3>
        </a>
        </div>
      </div>

      <!-- Purchase Report Button -->
      <div class="flex items-center p-6 transition-all duration-200 transform bg-white rounded-lg shadow-md hover-card">
        <div class="p-4 text-white bg-gray-500 rounded-full">
          <i class="fas fa-file-alt fa-2x"></i>
        </div>
        <div class="ml-4">
          <a href="{{url('purchases')}}">
          <h3 class="text-sm text-gray-500">Purchase Report</h3>
          </a>
        </div>
      </div>

      <!-- Stock Report Button -->
      <div class="flex items-center p-6 transition-all duration-200 transform bg-white rounded-lg shadow-md hover-card">
        <div class="p-4 text-white rounded-full bg-cyan-500">
          <i class="fas fa-boxes fa-2x"></i>
        </div>
        <div class="ml-4">
          <a href="{{url('admin/stocks')}}">
          <h3 class="text-sm text-gray-500">Stock Report</h3>
          </a>
        </div>
      </div>

      <!-- Supplier Return Button -->
      <div class="flex items-center p-6 transition-all duration-200 transform bg-white rounded-lg shadow-md hover-card">
        <div class="p-4 text-white bg-orange-600 rounded-full">
          <i class="fas fa-undo fa-2x"></i>
        </div>
        <div class="ml-4">
          <a href="{{ url('supplier-return') }}" class="text-sm text-gray-500 hover:text-blue-600">Supplier Return</a>
        </div>
      </div>

      <!-- Sales Return Button -->
      <div class="flex items-center p-6 transition-all duration-200 transform bg-white rounded-lg shadow-md hover-card">
        <div class="p-4 text-white bg-red-600 rounded-full">
          <i class="fas fa-undo-alt fa-2x"></i>
        </div>
        <div class="ml-4">
          <a href="{{ url('sales_returns') }}" class="text-sm text-gray-500 hover:text-blue-600">Sales Return</a>
        </div>
      </div>
    </div>
  </div>

</body>

</html>
