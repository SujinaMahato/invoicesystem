@extends('layouts.app')

@section('content')
<div class="container p-6 mx-auto">
    <div class="p-6 bg-white rounded shadow-md">
        <h1 class="mb-6 text-xl font-bold">Edit Sale</h1>

        <form action="{{ route('sale.update', $sale->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Customer and Date Section -->
            <div class="grid grid-cols-3 gap-4 mb-6">
                <div>
                    <label for="customer_id" class="block text-sm font-medium">Customer Name<span class="text-red-500">*</span></label>
                    <input type="text" name="customer_name" id="customer_name" value="{{ old('customer_id', $sale->customer->customer_name) }}" class="w-full p-2 border border-gray-400 rounded">
                </div>
                <div>
                    <label for="date" class="block text-sm font-medium">Date <span class="text-red-500">*</span></label>
                    <input type="date" id="date" name="date" value="{{ old('date', $sale->date) }}" class="w-full p-2 border border-gray-300 rounded">
                </div>
            </div>

            <!-- Product Information Table -->
            <div class="mb-6 overflow-x-auto">
                <table class="min-w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-200">
                        <tr>
                            <th class="px-4 py-2">Item Information <span class="text-red-500">*</span></th>
                            <th class="px-4 py-2">Batch No</th>
                            <th class="px-4 py-2">Qnty <span class="text-red-500">*</span></th>
                            <th class="px-4 py-2">Unit <span class="text-red-500">*</span></th>
                            <th class="px-4 py-2">Rate <span class="text-red-500">*</span></th>
                            <th class="px-4 py-2">Discount %</th>
                            <th class="px-4 py-2">Dis.value</th>
                            <th class="px-4 py-2">VAT %</th>
                            <th class="px-4 py-2">VAT.value</th>
                            <th class="px-4 py-2">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="px-4 py-2">
                                <input type="text" name="product_name" value="{{ old('product_name', $sale->product_name) }}" class="w-full p-2 border border-gray-300 rounded">
                            </td>
                            <td class="px-4 py-2">
                                <input type="text" name="batch_no" value="{{ old('batch_no', $sale->batch_no) }}" class="w-full p-2 border border-gray-300 rounded">
                            </td>
                            <td class="px-4 py-2">
                                <input type="number" name="quantity"value="{{ old('quantity', $sale->quantity) }}" class="w-full p-2 border border-gray-300 rounded">
                            </td>
                            <td class="px-4 py-2">
                                <input type="number" name="unit" value="{{ old('unit', $sale->unit) }}" class="w-full p-2 border border-gray-300 rounded">
                            </td>
                            <td class="px-4 py-2">
                                <input type="number" name="rate" value="{{ old('rate', $sale->rate) }}" class="w-full p-2 border border-gray-300 rounded">
                            </td>
                            <td class="px-4 py-2">
                                <input type="number" name="discount_percentage" value="{{ old('discount_percentage', $sale->discount_percentage) }}" class="w-full p-2 border border-gray-300 rounded">
                            </td>
                            <td class="px-4 py-2">
                                <input type="number" name="dis_value" vvalue="{{ old('dis_value', $sale->dis_value) }}" class="w-full p-2 border border-gray-300 rounded">
                            </td>
                            <td class="px-4 py-2">
                                <input type="number" name="vat" value="{{ old('vat', $sale->vat) }}" class="w-full p-2 border border-gray-300 rounded">
                            </td>
                            <td class="px-4 py-2">
                                <input type="number" name="vat_value" value="{{ old('vat_value', $sale->vat_value) }}" class="w-full p-2 border border-gray-300 rounded">
                            </td>
                            <td class="px-4 py-2">
                                <input type="number" name="total" value="{{ old('total', $sale->total) }}" class="w-full p-2 border border-gray-300 rounded">
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

                    <div class="text-right">Sale Discount:</div>
                    <div><input type="text" name="sale_discount" placeholder="0.00" value="{{ old('sale_discount', $sale->sale_dicount) }}" class="w-full p-2 border border-gray-300 rounded"></div>

                    <div class="text-right">Total Discount:</div>
                    <div><input type="text" name="total_discount" placeholder="0.00" value="{{ old('total_discount', $sale->total_discount) }}" class="w-full p-2 border border-gray-300 rounded"></div>

                    <div class="text-right">Total VAT:</div>
                    <div><input type="text" name="total_vat" placeholder="0.00" value="{{ old('total_vat', $sale->total_vat) }}" class="w-full p-2 border border-gray-300 rounded"></div>
                    
                    <div class="text-right">Shipping Cost:</div>
                    <div><input type="text" name="shipping_cost" placeholder="0.00" value="{{ old('shipping_cost', $sale->shipping_cost) }}" class="w-full p-2 border border-gray-300 rounded"></div>

                    <div class="text-right">Grand Total:</div>
                    <div><input type="text" name="grand_total" placeholder="0.00" value="{{ old('grand_total', $sale->grand_total) }}" class="w-full p-2 border border-gray-300 rounded"></div>

                    <div class="text-right">Net Total:</div>
                    <div><input type="text" name="net_total" placeholder="0.00" value="{{ old('net_total', $sale->net_total) }}" class="w-full p-2 border border-gray-300 rounded"></div>

                    <div class="text-right">Due Amount:</div>
                    <div><input type="text" name="due" placeholder="0.00" value="{{ old('due', $sale->due) }}" class="w-full p-2 border border-gray-300 rounded"></div>

                    <div class="text-right">Change:</div>
                    <div><input type="text" name="change" placeholder="0.00" value="{{ old('change', $sale->change) }}" class="w-full p-2 border border-gray-300 rounded"></div>
                </div>
            </div>
        </div>

        <!-- Payment Section Below -->
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="payment_type" class="block text-sm font-medium">Payment Type</label>
                <select id="payment_type" name="payment_type" value="{{ old('payment_type', $sale->payment_type) }}"  class="w-full p-2 border border-gray-300 rounded">
                    <option value="">Select option</option>
                    <option value="cash">Cash</option>
                   
                </select>
            </div>
            <div>
                <label for="paid_amount" class="block text-sm font-medium">Paid Amount</label>
                <input type="text" id="paid_amount" name="paid_amount" value="{{ old('paid_amount', $sale->paid_amount) }}" class="w-full p-2 border border-gray-300 rounded">
            </div>
        </div>


            <!-- Submit Button -->
            <div class="text-right">
                <button type="submit" class="px-6 py-2 text-white bg-purple-500 rounded-md">Update Sale</button>
            </div>
        </form>
    </div>
</div>
@endsection