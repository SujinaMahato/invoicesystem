<div :class="{ 'translate-x-0': open, '-translate-x-full': !open }"
    class="fixed inset-y-0 left-0 w-64 text-white transition-transform duration-300 ease-in-out transform bg-purple-500">
    <div class="relative h-full">
        <!-- Scrollable Sidebar Content -->
        <div class="h-full p-4 overflow-y-auto">
            <div class="mb-8 text-center">
                <h1 class="text-2xl font-bold">Admin User</h1>
                <div class="flex justify-center mb-2">
                    @if (Auth::user() && Auth::user()->usertype === 'admin')
                        <img src="/images/admin.png" alt="Admin" class="w-20 h-20 rounded-full">
                    @else
                        <img src="{{ asset('assets/dist/img/other-user.jpg') }}" alt="User" class="w-20 h-20 rounded-full">
                    @endif
                </div>
                <span class="text-sm text-black">Admin</span>
            </div>
            <nav class="space-y-4">
                <!-- Dashboard -->
                <a href="{{url('/dashboard')}}" class="flex items-center px-4 py-2 rounded hover:bg-gray-600">
                    <img src="/images/dashboard.png" alt="Dashboard" class="w-5 h-5 mr-2">Dashboard
                </a>

                <!-- Sale Dropdown -->
                <div @click="saleDropdown = !saleDropdown" class="cursor-pointer">
                    <a class="flex items-center px-4 py-2 rounded hover:bg-gray-600">
                        <img src="/images/sale.png" alt="Sale" class="w-5 h-5 mr-2">Sale
                        <span class="ml-auto text-xs" x-show="!saleDropdown">&#9660;</span>
                        <span class="ml-auto text-xs" x-show="saleDropdown">&#9650;</span>
                    </a>
                    <div x-show="saleDropdown" class="pl-8">
                        <a href="{{route('sale.create')}}" class="block px-4 py-2 rounded hover:bg-gray-600">New Sale</a>
                        <a href="{{route('sale.index')}}" class="block px-4 py-2 rounded hover:bg-gray-600">Manage Sale</a>
                        <a href="{{route('manage.add')}}" class="block px-4 py-2 rounded hover:bg-gray-600">Add Sales term</a>
                        <a href="{{route('manage.list')}}" class="block px-4 py-2 rounded hover:bg-gray-600">Sales term list</a>
                    </div>
                </div>

                <!-- Customer Dropdown -->
                <div @click="customerDropdown = !customerDropdown" class="cursor-pointer">
                    <a class="flex items-center px-4 py-2 rounded hover:bg-gray-600">
                        <img src="/images/customer.jpeg" alt="Customer" class="w-5 h-5 mr-2">Customer
                        <span class="ml-auto text-xs" x-show="!customerDropdown">&#9660;</span>
                        <span class="ml-auto text-xs" x-show="customerDropdown">&#9650;</span>
                    </a>
                    <div x-show="customerDropdown" class="pl-8">
                        <a href="{{url('/add-customer')}}" class="block px-4 py-2 rounded hover:bg-gray-600">Add Customer</a>
                        <a href="{{route('customers.index')}}" class="block px-4 py-2 rounded hover:bg-gray-600">Customer List</a>
                    </div>
                </div>

                <!-- Supplier Dropdown -->
                <div @click="supplierDropdown = !supplierDropdown" class="cursor-pointer">
                    <a class="flex items-center px-4 py-2 rounded hover:bg-gray-600">
                        <img src="/images/supplier.png" alt="Supplier" class="w-5 h-5 mr-2">Supplier
                        <span class="ml-auto text-xs" x-show="!supplierDropdown">&#9660;</span>
                        <span class="ml-auto text-xs" x-show="supplierDropdown">&#9650;</span>
                    </a>
                    <div x-show="supplierDropdown" class="pl-8">
                        <a href="{{url('/addsupplier')}}" class="block px-4 py-2 rounded hover:bg-gray-600">Add Supplier</a>
                        <a href="{{route('supplier.index')}}" class="block px-4 py-2 rounded hover:bg-gray-600">Supplier List</a>
                    </div>
                </div>

                <!-- Product Dropdown -->
                <div @click="productDropdown = !productDropdown" class="cursor-pointer">
                    <a class="flex items-center px-4 py-2 rounded hover:bg-gray-600">
                        <img src="/images/product.jpeg" alt="Product" class="w-5 h-5 mr-2">Product
                        <span class="ml-auto text-xs" x-show="!productDropdown">&#9660;</span>
                        <span class="ml-auto text-xs" x-show="productDropdown">&#9650;</span>
                    </a>
                    <div x-show="productDropdown" class="pl-8">
                        <a href="{{url('/add')}}" class="block px-4 py-2 rounded hover:bg-gray-600">Add Category</a>
                        <a href="{{url('/list')}}" class="block px-4 py-2 rounded hover:bg-gray-600">Category List</a>
                        <a href="{{route('unit.add')}}" class="block px-4 py-2 rounded hover:bg-gray-600">Add Unit</a>
                        <a href="{{route('unit.list')}}" class="block px-4 py-2 rounded hover:bg-gray-600">Unit List</a>
                        <a href="{{route('product.add')}}" class="block px-4 py-2 rounded hover:bg-gray-600">Add Product</a>
                        <a href="{{route('product.list')}}" class="block px-4 py-2 rounded hover:bg-gray-600">Manage Product</a>
                    </div>
                </div>

                <!-- Purchase Dropdown -->
                <div @click="purchaseDropdown = !purchaseDropdown" class="cursor-pointer">
                    <a class="flex items-center px-4 py-2 rounded hover:bg-gray-600">
                        <img src="/images/purchase.png" alt="Purchase" class="w-5 h-5 mr-2">Purchase
                        <span class="ml-auto text-xs" x-show="!purchaseDropdown">&#9660;</span>
                        <span class="ml-auto text-xs" x-show="purchaseDropdown">&#9650;</span>
                    </a>
                    <div x-show="purchaseDropdown" class="pl-8">
                        <a href="{{route('purchases.create')}}" class="block px-4 py-2 rounded hover:bg-gray-600">Add Purchase</a>
                        <a href="{{route('purchases.index')}}" class="block px-4 py-2 rounded hover:bg-gray-600">Purchase List</a>
                    </div>
                </div>

                <!-- Stock Dropdown -->
                <div @click="stockDropdown = !stockDropdown" class="cursor-pointer">
                    <a class="flex items-center px-4 py-2 rounded hover:bg-gray-600">
                        <img src="/images/stock.png" alt="Stock" class="w-5 h-5 mr-2">Stock
                        <span class="ml-auto text-xs" x-show="!stockDropdown">&#9660;</span>
                        <span class="ml-auto text-xs" x-show="stockDropdown">&#9650;</span>
                    </a>
                    <div x-show="stockDropdown" class="pl-8">
                        <a href="{{route('stocks.list')}}" class="block px-4 py-2 rounded hover:bg-gray-600">Stock Report</a>
                    </div>
                </div>

                <!-- Reports Dropdown -->
                <div @click="reportsDropdown = !reportsDropdown" class="cursor-pointer">
                    <a class="flex items-center px-4 py-2 rounded hover:bg-gray-600">
                        <img src="/images/report.png" alt="Reports" class="w-5 h-5 mr-2">Reports
                        <span class="ml-auto text-xs" x-show="!reportsDropdown">&#9660;</span>
                        <span class="ml-auto text-xs" x-show="reportsDropdown">&#9650;</span>
                    </a>
                    <div x-show="reportsDropdown" class="pl-8">
                        <a href="{{route('sales_returns.index')}}" class="block px-4 py-2 rounded hover:bg-gray-600">SalesReturn Report</a>
                        <a href="#" class="block px-4 py-2 rounded hover:bg-gray-600">SupplierReturn Report</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>

<!-- Sidebar Toggle Button -->
<div @click="open = !open"
    class="fixed z-30 p-2 text-black rounded-full cursor-pointer top-2 left-2">
    <span class="text-lg">&#9776;</span> <!-- Three horizontal lines icon -->
</div>
