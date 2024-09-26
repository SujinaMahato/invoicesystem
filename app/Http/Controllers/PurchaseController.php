<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\Product;

class PurchaseController extends Controller
{
    //
    public function index()
    {
        $purchases = Purchase::all();
        $purchases = Purchase::with('supplier')->get();

        return view('admin.purchase.list', compact('purchases'));
    }

    // Show form to create a new purchase
    public function create()
    {
        $suppliers = Supplier::all();  // Get suppliers for the dropdown
        $products = Product::all(); 
        return view('admin.purchase.add', compact('suppliers','products'));
    }

    // Store the new purchase
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'supplier_id' => 'required|exists:suppliers,id',
        'chalan_no' => 'required|string',
        'purchase_date' => 'required|date',
        'product_name' => 'required|array',
        'product_name.*' => 'required|string',
        'stock_quantity' => 'required|array',
        'stock_quantity.*' => 'required|integer',
        'expiry_date' => 'array',
        'batch_no' => 'array',
        'quantity' => 'required|array',
        'quantity.*' => 'required|integer',
        'rate' => 'required|array',
        'rate.*' => 'required|numeric',
        'discount_percentage' => 'array',
        'vat' => 'array',
        'total' => 'array',
        'grand_total' => 'required|numeric',
        'payment_type' => 'required|in:cash',
        // Add validation for other fields as necessary
    ]);

    foreach ($validatedData['product_name'] as $index => $productName) {
        Purchase::create([
            'supplier_id' => $validatedData['supplier_id'],
            'chalan_no' => $validatedData['chalan_no'],
            'purchase_date' => $validatedData['purchase_date'],
            'product_name' => $productName,
            'stock_quantity' => $validatedData['stock_quantity'][$index],
            'expiry_date' => $validatedData['expiry_date'][$index] ?? null,
            'batch_no' => $validatedData['batch_no'][$index] ?? null,
            'quantity' => $validatedData['quantity'][$index],
            'rate' => $validatedData['rate'][$index],
            'discount_percentage' => $validatedData['discount_percentage'][$index] ?? 0,
            'grand_total' => $validatedData['grand_total'],
            'payment_type' => $validatedData['payment_type'],
        ]);
    }

    return redirect()->route('purchases.index')->with('success', 'Purchase added successfully!');
}
    // Show form to edit a purchase
    public function edit($id)
    {
        $purchase = Purchase::findOrFail($id);
        $suppliers = Supplier::all();
        return view('admin.purchase.edit', compact('purchase', 'suppliers'));
    }
    public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'supplier_id' => 'required|exists:suppliers,id',
        'chalan_no' => 'required|string|max:255',
        'purchase_date' => 'required|date',
        'product_name' => 'required|string|max:255',
        'quantity' => 'required|numeric|min:1',
        'rate' => 'required|numeric',
        'discount_percentage' => 'nullable|numeric|min:0|max:100',
        'grand_total' => 'required|numeric',
        'payment_type' => 'required|in:cash,credit',
    ]);

    $purchase = Purchase::findOrFail($id);
    $purchase->update($validatedData);

    // Assuming you handle products separately or do not handle them in this method
    // If needed, handle product details here

    return redirect()->route('purchases.index')->with('success', 'Purchase updated successfully.');
}



    // Delete a purchase
    public function destroy($id)
    {
        $purchase = Purchase::findOrFail($id);
        $purchase->delete();

        return redirect()->route('purchases.index')->with('success', 'Purchase deleted successfully.');
    }
}
