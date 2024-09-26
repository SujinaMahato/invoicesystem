<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Sale;
use App\Models\Product;



class SaleController extends Controller
{
    public function index()
    {
        
        $sales = Sale::all();
        return view('admin.sale.managesale', compact('sales'));
    }
    public function create(Request $request)
    
    {
        // Fetch all customers
    $customers = Customer::all();
    
    return view('admin.sale.newsale', compact('customers'));
    }
    public function store(Request $request)
    {   
        //dd($request->all());
        $validatedData = $request->validate([
            'customer_id' => 'required|exists:customers,id', // Customer name should reference the customer_id
            'date' => 'required|date',
            'product_name' => 'required|string',
            'batch_no' => 'nullable|string|max:255',
            'quantity' => 'required|numeric|min:1',
            'unit' => 'required|numeric',
            'rate' => 'required|numeric|min:0',
            'discount_percentage' => 'nullable|numeric',
            'dis_value' => 'nullable|numeric',
            'vat' => 'nullable|numeric|min:0',
            'vat_value' => 'nullable|numeric|min:0',
            'total' => 'required|numeric',
            'sale_discount' => 'nullable|numeric',
            'total_discount' => 'nullable|numeric',
            'total_vat' => 'nullable|numeric',
            'shipping_cost' => 'nullable|numeric',
            'grand_total' => 'nullable|numeric',
            'net_total' => 'nullable|numeric',
            'due' => 'required|numeric',
            'change' => 'required|numeric',
            'payment_type' => 'required|string|in:cash',
            'paid_amount' => 'required|numeric',
        ]);

        Sale::create($validatedData);
    
        return redirect()->route('sale.index')->with('success', 'Sale added successfully!');
    }   
     public function list(Request $request)
    {
        $sales = Sale::all();
        return view('admin.sale.managesale', compact('sales'));
    }
    public function edit($id)
    {
        // Fetch customer details by ID
        $sale = Sale::find($id);
       
        
        if (!$sale) {
            return redirect()->route('sale.index')->withErrors('Sale not found');
        }
        $customers = Customer::all(); // Fetch suppliers for the edit view
        // Return the edit view
        return view('admin.sale.editsale', compact('sale','customers'));
    }

    public function update(Request $request, $id)
{
    $sale = Sale::find($id);
    if (!$sale) {
        return redirect()->route('sale.index')->withErrors('Sale not found');
    }
    $validatedData = $request->validate([
        'customer_name' => 'required|string', // Customer name should reference the customer_id
        'date' => 'required|date',
        'product_name' => 'required|string',
        'batch_no' => 'nullable|string|max:255',
        'quantity' => 'required|numeric|min:1',
        'unit' => 'required|numeric',
        'rate' => 'required|numeric|min:0',
        'discount_percentage' => 'nullable|numeric',
        'dis_value' => 'nullable|numeric',
        'vat' => 'nullable|numeric|min:0',
        'vat_value' => 'nullable|numeric|min:0',
        'total' => 'required|numeric',
        'sale_discount' => 'nullable|numeric',
        'total_discount' => 'nullable|numeric',
        'total_vat' => 'nullable|numeric',
        'shipping_cost' => 'nullable|numeric',
        'grand_total' => 'nullable|numeric',
        'net_total' => 'nullable|numeric',
        'due' => 'required|numeric',
        'change' => 'required|numeric',
        'payment_type' => 'required|string|in:cash,credit,esewa',
        'paid_amount' => 'required|numeric',
    ]);

    $sale->update($validatedData); // Update customer data
    return redirect()->route('sale.index')->with('success', 'Sale updated successfully!');
}
public function destroy($id)
{
    $sale = Sale::find($id);

    if ($sale) {
        $sale->delete();
        return redirect()->route('sale.index')->with('success', 'Sale deleted successfully.');
    }

    return redirect()->route('sale.index')->with('error', 'Sale not found.');
}
public function show($id)
{
    // Fetch customer details by ID
    $sale = Sale::find($id);
    
    if (!$sale) {
        return redirect()->route('sale.index')->withErrors('Sale not found');
    }
    $customers = Customer::all(); // Fetch customers for the edit view
    // Return the edit view
    return view('admin.sale.editsale', compact('sale','customers'));
}
}
