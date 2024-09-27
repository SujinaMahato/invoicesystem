<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SalesReturn;
use App\Models\Product;

class SalesReturnController extends Controller
{
    public function index()
    {
        $salesReturns = SalesReturn::all();
        return view('admin.report.manage', compact('salesReturns'));
    }
    public function create()
    {
        $products = Product::all(); 
        $salesReturns = SalesReturn::all();
        // Code for handling the sales return creation
        return view('admin.report.salesreturns', compact('salesReturns' ,'products'));

    }

    public function store(Request $request)
    {
        //dd($request->all());
        $validated = $request->validate([
            'product_name'=>'required',
            'invoice_no' => 'required|string',
            'customer_name' => 'required|string',
            'date' => 'required|date',
            'total_amount' => 'required|numeric',
        ]);

// Create a new sales return record
SalesReturn::create([
    'product_name'=>$request->product_name,
    'invoice_no' => $request->invoice_no,
    'customer_name' => $request->customer_name,
    'date' => $request->date,
    'total_amount' => $request->total_amount,
]);        
        return redirect()->route('sales_returns.index')->with('success', 'Sales return created successfully.');
    
    }
public function edit($id)
    {
        // Fetch customer details by ID
        $salesReturns = SalesReturn::find($id);
        
        if (!$salesReturns) {
            return redirect()->route('sales_returns.index')->withErrors('Sales return not found');
        }
        return view('admin.report.edit', compact('salesReturns'));
    }
    public function list(Request $request)
    {
        $salesReturns = SalesReturn::all();
        return view('admin.report.manage', compact('salesReturns'));
    }
    public function update(Request $request, $id)
    {
        $salesReturns = SalesReturn::find($id);
        if (!$salesReturns) {
            return redirect()->route('sales_returns.index')->withErrors('Sales return not found');
        }
        $validatedData = $request->validate([
            'product_name'=>'required',
            'invoice_no' => 'required|string',
            'customer_name' => 'required|string',
            'date' => 'required|date',
            'total_amount' => 'required|numeric',
        ]);

        $salesReturns->update($validatedData); // Update customer data
        return redirect()->route('sales_returns.index')->with('success', 'Sales return updated successfully!');
    }
    public function destroy($id)
{
    $salesReturns = SalesReturn::find($id);

    if ($salesReturns) {
        $salesReturns->delete();
        return redirect()->route('sales_returns.index')->with('success', 'Sales return deleted successfully.');
    }

    return redirect()->route('sales_returns.index')->with('error', 'Sales return not found.');
}
}
