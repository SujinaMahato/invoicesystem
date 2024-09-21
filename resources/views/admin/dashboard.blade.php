 
 
 @extends('admin.includes.main')
 @section('content')
     
 <!-- Main Content -->
 <div class="flex-1 p-6 ml-64">
    <!-- Dashboard Header -->
   
    
    <div class="grid grid-cols-4 gap-4">
        <div class="p-6 bg-white rounded-lg shadow">
            <h3 class="text-xl font-bold">Total Customer</h3>
            <p class="text-4xl text-green-500">1251</p>
        </div>
        <div class="p-6 bg-white rounded-lg shadow">
            <h3 class="text-xl font-bold">Total Product</h3>
            <p class="text-4xl text-blue-500">19</p>
        </div>
        <div class="p-6 bg-white rounded-lg shadow">
            <h3 class="text-xl font-bold">Total Supplier</h3>
            <p class="text-4xl text-purple-500">0</p>
        </div>
        <div class="p-6 bg-white rounded-lg shadow">
            <h3 class="text-xl font-bold">Total Sale</h3>
            <p class="text-4xl text-red-500">23</p>
        </div>
    </div>
</div>
 @endsection