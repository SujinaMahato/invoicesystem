<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
  
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
   
    

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100" x-data="{ open: {{ request()->is('dashboard') ? 'true' : 'false' }}, saleDropdown: false, customerDropdown: false, supplierDropdown: false, productDropdown: false, purchaseDropdown: false, stockDropdown: false, accountsDropdown: false, reportsDropdown: false }">
       
   
    

    <!-- Main Container -->
    <div class="flex min-h-screen">

       <!-- Including Menubar -->
       @include('admin.includes.menubar')


       <!-- Main Content -->
      
       @yield('content')

    </div>

</body>
</html>
