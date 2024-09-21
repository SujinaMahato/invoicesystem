<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Unit;
use App\Models\Product;



class ProductController extends Controller
{
    //
    public function add(){
        $categories = Category::all(); 
        $suppliers = Supplier::all(); 
        $units=unit::all();
    
        return view('admin.product.add', compact('categories', 'suppliers','units'));
    }
    
    public function store(Request $request) {
        $request->validate([
            'barcode' => 'required',
            'sn' => 'required',
            'product_name' => 'required',
            'category_id' => 'required',
            'sale_price' => 'required',
            'cost_price' => 'required',
            'supplier_id' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation as needed
            'model' => 'required',
            'unit_id' => 'required',
            'details' => 'required',
            'vat' => 'required',
        ]);
    
        $data = $request->except('image');
    
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);
            $data['image'] = $imageName;
        }
    
        Product::create($data);
        return redirect()->route('product.list')->with('status', 'Product saved successfully');
    }
    
    
    public function list(Request $request)
{
    $query = Product::query();

    if ($request->has('search') && !empty($request->input('search'))) {
        $searchTerm = $request->input('search');
        $query->where('product_name', 'like', "%{$searchTerm}%");
    }

    $products = $query->get();

    return view('admin.product.list', compact('products'));
}

public function edit($id)
{
    $product = Product::findOrFail($id);
    $categories = Category::all();
    $suppliers = Supplier::all();
    $units = Unit::all();

    return view('admin.product.edit', compact('product', 'categories', 'suppliers', 'units'));
}

public function update(Request $request, $id)
{
    // Debug the uploaded file (you can remove this line after confirming it's working)
    // dd($request->file('image'));

    // Validate the request
    $request->validate([
        'barcode' => 'required',
        'sn' => 'required',
        'product_name' => 'required',
        'category_id' => 'required',
        'sale_price' => 'required',
        'cost_price' => 'required',
        'supplier_id' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        'model' => 'required',
        'unit_id' => 'required',
        'details' => 'required',
        'vat' => 'required',
    ]);

    // Find the product
    $product = Product::findOrFail($id);

    // Update the product with other fields
    $product->update([
        'barcode' => $request->barcode,
        'sn' => $request->sn,
        'product_name' => $request->product_name,
        'category_id' => $request->category_id,
        'sale_price' => $request->sale_price,
        'cost_price' => $request->cost_price,
        'supplier_id' => $request->supplier_id,
        'model' => $request->model,
        'unit_id' => $request->unit_id,
        'details' => $request->details,
        'vat' => $request->vat,
    ]);

    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads'), $imageName);
        $product->update(['image' => $imageName]);
    }

    
    return redirect()->route('product.list')->with('status', 'Product updated successfully');
}

public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('product.list')->with('status', 'Product deleted successfully');
    }

    }

