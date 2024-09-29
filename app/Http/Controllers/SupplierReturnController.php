<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SupplierReturn;
use App\Models\Supplier;

class SupplierReturnController extends Controller
{
    //
    public function index()
    {
        // Fetch supplier returns from the database
        $supplierReturns = SupplierReturn::all();


        // Pass the $supplierReturns variable to the view
        return view('admin.report.supplier-return', compact('supplierReturns'));
    }

    public function create()
{
    // Fetch suppliers from the database
    $suppliers = Supplier::select('name')->get();

    // Pass suppliers to the view
    return view('admin.report.form', compact('suppliers'));
}
Public function report(){
    return view('admin.report.salesreport');
}

    // Store new Supplier Return record
    public function store(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'supplier_name' => 'required|string|max:255',
            'invoice_number' => 'required|string|max:255',
            'date' => 'required|date',
            'total_amount' => 'required|numeric',
        ]);

        // Create new Supplier Return
        SupplierReturn::create([
            'supplier_name' => $request->supplier_name,
            'invoice_number' => $request->invoice_number,
            'date' => $request->date,
            'total_amount' => $request->total_amount,
        ]);

        // Redirect back to the supplier return page after form submission
        return redirect()->route('supplier-return');
    }

    public function edit($id)
    {
        // Fetch the supplier return using the id
        $supplierReturn = SupplierReturn::findOrFail($id);
        $suppliers = Supplier::all();
    
        // Pass the supplier return data to the edit view
        return view('admin.report.editreport', compact('supplierReturn','suppliers'));
    }
    
    public function update(Request $request, $id)
    {
        // Validate incoming request
        $request->validate([
            'supplier_name' => 'required|string|max:255',
            'invoice_number' => 'required|string|max:255',
            'date' => 'required|date',
            'total_amount' => 'required|numeric',
        ]);
    
        // Find the supplier return and update its details
        $supplierReturn = SupplierReturn::find($id);
        $supplierReturn->update([
            'supplier_name' => $request->supplier_name,
            'invoice_number' => $request->invoice_number,
            'date' => $request->date,
            'total_amount' => $request->total_amount,
        ]);
    
        // Redirect back to the supplier return page after update
        return redirect()->route('supplier-return')->with('success', 'Supplier Return updated successfully');
    }
    
    public function destroy($id)
    {
        // Find and delete the supplier return
        $supplierReturn = SupplierReturn::find($id);
        $supplierReturn->delete();
    
        // Redirect back to the supplier return page after deletion
        return redirect()->route('supplier-return')->with('success', 'Supplier Return deleted successfully');
    }
}
