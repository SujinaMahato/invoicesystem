<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\stock;
use App\Models\Product;

class StockController extends Controller
{
    public function list()
    {
        $stocks = Stock::with('product')->get();
        return view('admin.stock.list', compact('stocks'));
    }

    public function add()
    {
        $products = Product::all(); // Fetch all products to choose from
        return view('admin.stock.add', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:0',
            'status' => 'required|in:active,inactive',
        ]);

        Stock::create([
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'status' => $request->status,
        ]);

        return redirect()->route('stocks.list')->with('success', 'Stock added successfully.');
    }

    public function edit($id)
    {
        $stock = Stock::findOrFail($id);
        $products = Product::all(); // Fetch all products for selection
        return view('admin.stock.edit', compact('stock', 'products'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:0',
            'status' => 'required|in:active,inactive',
        ]);

        $stock = Stock::findOrFail($id);
        $stock->update([
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'status' => $request->status,
        ]);

        return redirect()->route('stocks.list')->with('success', 'Stock updated successfully.');
    }
    public function destroy($id)
    {
        $stock = Stock::findOrFail($id);
        $stock->delete();

        return redirect()->route('stocks.list')->with('success', 'Stock deleted successfully.');
    }
}

