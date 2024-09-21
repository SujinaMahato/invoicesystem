@include('admin.includes.header')
@section('content')
        <!-- Header -->
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-semibold">New Sale</h1>
            <button class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600">Manage Sale</button>
        </div>

        <!-- Customer Information -->
        <div class="grid grid-cols-1 gap-4 mb-6 md:grid-cols-3">
            <div class="col-span-2">
                <label for="customer" class="block font-medium text-gray-700">Customer Name <span class="text-red-500">*</span></label>
                <input type="text" id="customer" class="block w-full p-2 mt-1 border border-gray-300 rounded-md" placeholder="Customer Name">
            </div>
            
            <div class="flex items-end space-x-2">
                <div class="w-full">
                    <label for="date" class="block font-medium text-gray-700">Date <span class="text-red-500">*</span></label>
                    <input type="date" id="date" class="block w-full p-2 mt-1 border border-gray-300 rounded-md" value="2024-09-17">
                </div>
                <button class="px-4 py-2 text-white bg-green-500 rounded-md hover:bg-green-600">+</button>
            </div>

            <div class="col-span-2">
                <label for="customer" class="block font-medium text-gray-700">Phone <span class="text-red-500">*</span></label>
                <input type="text" id="customer" class="block w-full p-2 mt-1 border border-gray-300 rounded-md" placeholder="Customer Phone">
            </div>
        </div>

        <!-- Product Table -->
        <div class="mb-6 overflow-x-auto">
            <table class="min-w-full text-center border">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 border">Item Information <span class="text-red-500">*</span></th>
                        <th class="px-4 py-2 border">Desc</th>
                        <th class="px-4 py-2 border">Batch No</th>
                        <th class="px-4 py-2 border">Av. Qnty</th>
                        <th class="px-4 py-2 border">Unit</th>
                        <th class="px-4 py-2 border">Qnty <span class="text-red-500">*</span></th>
                        <th class="px-4 py-2 border">Rate <span class="text-red-500">*</span></th>
                        <th class="px-4 py-2 border">Discount %</th>
                        <th class="px-4 py-2 border">Dis. Value</th>
                        <th class="px-4 py-2 border">Vat %</th>
                        <th class="px-4 py-2 border">VAT Value</th>
                        <th class="px-4 py-2 border">Total</th>
                        <th class="px-4 py-2 border">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="px-2 py-2 border">
                            <input type="text" placeholder="Product Name" class="w-full p-1 border-gray-300 rounded-md">
                        </td>
                        <td class="px-2 py-2 border"><input type="text" class="w-full p-1 border-gray-300 rounded-md"></td>
                        <td class="px-2 py-2 border">
                            <select class="w-full p-1 border-gray-300 rounded-md">
                                <option>Select option</option>
                            </select>
                        </td>
                        <td class="px-2 py-2 border"><input type="number" value="0" class="w-full p-1 border-gray-300 rounded-md"></td>
                        <td class="px-2 py-2 border"><input type="text" class="w-full p-1 border-gray-300 rounded-md"></td>
                        <td class="px-2 py-2 border"><input type="number" value="1" class="w-full p-1 border-gray-300 rounded-md"></td>
                        <td class="px-2 py-2 border"><input type="number" value="0.00" class="w-full p-1 border-gray-300 rounded-md"></td>
                        <td class="px-2 py-2 border"><input type="number" value="0.00" class="w-full p-1 border-gray-300 rounded-md"></td>
                        <td class="px-2 py-2 border"><input type="number" value="0.00" class="w-full p-1 border-gray-300 rounded-md"></td>
                        <td class="px-2 py-2 border"><input type="number" value="0.00" class="w-full p-1 border-gray-300 rounded-md"></td>
                        <td class="px-2 py-2 border"><input type="number" value="0.00" class="w-full p-1 border-gray-300 rounded-md"></td>
                        <td class="px-2 py-2 border"><input type="number" value="0.00" class="w-full p-1 border-gray-300 rounded-md"></td>
                        <td class="px-2 py-2 border">
                            <button class="px-3 py-1 text-white bg-red-500 rounded-md hover:bg-red-600">X</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Main Section with Sale Details and Totals -->
        <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
            <!-- Sale Details -->
            <div class="md:col-span-2">
                <label for="details" class="block font-medium text-gray-700">Sale Details</label>
                <textarea id="details" rows="2" class="w-full p-2 border border-gray-300 rounded-md"></textarea>
            </div>

            <!-- Totals Section (Aligned Right) -->
            <div class="md:col-span-1">
                <div class="space-y-4">
                    <div>
                        <label for="sale-discount" class="block font-medium text-gray-700">Sale Discount</label>
                        <input type="number" id="sale-discount" value="0.00" class="block w-full p-2 mt-1 border border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="total-discount" class="block font-medium text-gray-700">Total Discount</label>
                        <input type="number" id="total-discount" value="0.00" class="block w-full p-2 mt-1 border border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="total-vat" class="block font-medium text-gray-700">Total VAT</label>
                        <input type="number" id="total-vat" value="0.00" class="block w-full p-2 mt-1 border border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="shipping-cost" class="block font-medium text-gray-700">Shipping Cost</label>
                        <input type="number" id="shipping-cost" value="0.00" class="block w-full p-2 mt-1 border border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="grand-total" class="block font-medium text-gray-700">Grand Total</label>
                        <input type="number" id="grand-total" value="0.00" class="block w-full p-2 mt-1 border border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="previous" class="block font-medium text-gray-700">Previous</label>
                        <input type="number" id="previous" value="0.00" class="block w-full p-2 mt-1 border border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="net-total" class="block font-medium text-gray-700">Net Total</label>
                        <input type="number" id="net-total" value="0.00" class="block w-full p-2 mt-1 border border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="due" class="block font-medium text-gray-700">Due</label>
                        <input type="number" id="due" value="0.00" class="block w-full p-2 mt-1 border border-gray-300 rounded-md">
                    </div>

                    
                </div>
            </div>
        </div>

        <!-- Payment Section -->
        <div class="mt-6">
            <h2 class="text-xl font-semibold">Payment</h2>
            <div class="grid grid-cols-1 gap-4 mt-2 md:grid-cols-2">
                <div>
                    <label for="payment-type" class="block font-medium text-gray-700">Payment Type</label>
                    <select id="payment-type" class="w-full p-2 border border-gray-300 rounded-md">
                        <option>Cash In Hand</option>
                    </select>
                </div>
                <div>
                    <label for="paid-amount" class="block font-medium text-gray-700">Paid Amount</label>
                    <input type="number" id="paid-amount" value="0.00" class="block w-full p-2 mt-1 border border-gray-300 rounded-md">
                </div>
            </div>
            <div class="mt-2">
                <button class="px-4 py-2 text-white bg-purple-500 rounded-md hover:bg-green-600">Add New Payment Method</button>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="mt-6 text-right">
            <button class="px-6 py-2 text-white bg-purple-500 rounded-md hover:bg-green-600">Submit</button>
        </div>
    </div>
    @endsection

