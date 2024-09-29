@extends('layouts.app')

@section('content')

<div class="container p-6 mx-auto">
    <div class="p-6 bg-white rounded shadow-md">
        <div class="flex items-center justify-between mb-4">
            <!-- Add Product Heading on the left -->
            <h1 class="text-2xl font-bold">Add Product</h1>
        
            <!-- Dashboard Button on the right -->
            <a href="{{ url('dashboard') }}" class="px-4 py-2 text-white bg-purple-600 rounded-md hover:bg-purple-700">
                Dashboard
            </a>
        </div>
        

        <!-- Form Start -->
        <form action="{{ route('purchases.store') }}" method="POST">
            @csrf

            <!-- Supplier and Chalan No Section -->
            <div class="grid grid-cols-3 gap-4 mb-6">
                <div>
                    <label for="supplier_id" class="block text-sm font-medium">Supplier <span class="text-red-500">*</span></label>
                    <select name="supplier_id" id="supplier_id" class="w-full p-2 border border-gray-300 rounded" required>
                        <option value="">Select One</option>
                        @foreach (App\Models\Supplier::all() as $supplier)
                            <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="chalan_no" class="block text-sm font-medium">Chalan No <span class="text-red-500">*</span></label>
                    <input type="text" id="chalan_no" name="chalan_no" class="w-full p-2 border border-gray-300 rounded" required>
                </div>
                <div>
                    <label for="purchase_date" class="block text-sm font-medium">Purchase Date <span class="text-red-500">*</span></label>
                    <input type="date" id="purchase_date" name="purchase_date" value="{{ date('Y-m-d') }}" class="w-full p-2 border border-gray-300 rounded" required>
                </div>
            </div>

            <!-- Product Information Table -->
            <div class="mb-6 overflow-x-auto">
                <table class="min-w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-200">
                        <tr>
                            <th class="px-4 py-2">Item Information <span class="text-red-500">*</span></th>
                            <th class="px-4 py-2">Stock/Qnt</th>
                            <th class="px-4 py-2">Expiry Date</th>
                            <th class="px-4 py-2">Batch No</th>
                            <th class="px-4 py-2">Qnty <span class="text-red-500">*</span></th>
                            <th class="px-4 py-2">Rate <span class="text-red-500">*</span></th>
                            <th class="px-4 py-2">Discount %</th>
                            <th class="px-4 py-2">Dis. Value</th>
                            <th class="px-4 py-2">VAT %</th>
                            <th class="px-4 py-2">VAT Value</th>
                            <th class="px-4 py-2">Total</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="px-4 py-2">
                                <select name="product_name[]" class="w-full p-2 border border-gray-300 rounded" required>
                                    <option value="" disabled selected>Select a Product</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->product_name }}">{{ $product->product_name }}</option>
                                    @endforeach
                                </select>
                            </td>
                            
                            <td class="px-4 py-2">
                                <input type="number" name="stock_quantity[]" value="0.00" class="w-full p-2 border border-gray-300 rounded">
                            </td>
                            <td class="px-4 py-2">
                                <input type="date" name="expiry_date[]" class="w-full p-2 border border-gray-300 rounded">
                            </td>
                            <td class="px-4 py-2">
                                <input type="text" name="batch_no[]" placeholder="Batch No" class="w-full p-2 border border-gray-300 rounded">
                            </td>
                            <td class="px-4 py-2">
                                <input type="number" name="quantity[]" placeholder="0.00" class="w-full p-2 border border-gray-300 rounded" required>
                            </td>
                            <td class="px-4 py-2">
                                <input type="number" name="rate[]" placeholder="0.00" class="w-full p-2 border border-gray-300 rounded" required>
                            </td>
                            <td class="px-4 py-2">
                                <input type="number" name="discount_percentage[]" placeholder="0.00" class="w-full p-2 border border-gray-300 rounded">
                            </td>
                            <td class="px-4 py-2">
                                <input type="number" name="discount_value[]" placeholder="0.00" class="w-full p-2 border border-gray-300 rounded">
                            </td>
                            <td class="px-4 py-2">
                                <input type="number" name="vat[]" placeholder="0.00" class="w-full p-2 border border-gray-300 rounded">
                            </td>
                            <td class="px-4 py-2">
                                <input type="number" name="vat_value[]" placeholder="0.00" class="w-full p-2 border border-gray-300 rounded">
                            </td>
                            <td class="px-4 py-2">
                                <input type="number" name="total[]" placeholder="0.00" class="w-full p-2 border border-gray-300 rounded">
                            </td>
                            
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Summary Section -->
            <div class="grid grid-cols-2 gap-4 mb-6">
                <div class="flex justify-end">
                    <!-- Removed Add Item Button -->
                </div>
                <div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="text-right">Total:</div>
                        <div class="text-right">$<span id="summary-total">0.00</span></div>

                        <div class="text-right">Purchase Discount:</div>
                        <div><input type="text" name="purchase_discount" placeholder="0.00" class="w-full p-2 border border-gray-300 rounded"></div>

                        <div class="text-right">Total Discount:</div>
                        <div><input type="text" name="total_discount" placeholder="0.00" class="w-full p-2 border border-gray-300 rounded"></div>

                        <div class="text-right">Total VAT:</div>
                        <div><input type="text" name="total_vat" placeholder="0.00" class="w-full p-2 border border-gray-300 rounded"></div>

                        <div class="text-right">Grand Total:</div>
                        <div><input type="text" name="grand_total" placeholder="0.00" class="w-full p-2 border border-gray-300 rounded" required></div>

                        <div class="text-right">Paid Amount:</div>
                        <div><input type="text" name="paid_amount" placeholder="0.00" class="w-full p-2 border border-gray-300 rounded"></div>

                        <div class="text-right">Due Amount:</div>
                        <div><input type="text" name="due_amount" placeholder="0.00" class="w-full p-2 border border-gray-300 rounded"></div>
                    </div>
                </div>
            </div>

            <!-- Payment Section Below -->
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="payment_type" class="block text-sm font-medium">Payment Type</label>
                    <select id="payment_type" name="payment_type" class="w-full p-2 border border-gray-300 rounded">
                        <option value="">Select option</option>
                        <option value="cash">Cash</option>
                      
                    </select>
                </div>
                <div>
                    <label for="paid_amount" class="block text-sm font-medium">Paid Amount</label>
                    <input type="text" id="paid_amount" name="paid_amount" value="0.00" class="w-full p-2 border border-gray-300 rounded">
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end mt-6">
                <button type="submit" class="px-6 py-2 text-white bg-purple-500 rounded hover:bg-purple-600">Submit</button>
            </div>
        </form>
        <!-- Form End -->

    </div>
</div>

@endsection
