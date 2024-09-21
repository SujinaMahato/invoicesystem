<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function add(){
        return view('admin.category.add');
    }
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
        ]);
        Category::create($request->all());
        if ($request->has('save_and_add_another')) {
            return redirect()->route('categories.add')->with('status', 'Category saved. You can add another.');
        }

        return redirect('/list')->with('status', 'Category saved successfully.');
    }

    // Display a list of all categories
    public function list()
    {
        $categories = Category::all();
        return view('admin.category.list', compact('categories'));
    }
public function edit($id)
{
   
    $category = Category::findOrFail($id);
    return view('admin.category.edit', compact('category'));
}


    // Update the specified category in storage
    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
        ]);

        // Find the category and update it
        $category = Category::findOrFail($id);
        $category->update($request->all());

        return redirect('/list')->with('status', 'Category updated successfully.');
    }

    // Remove the specified category from storage
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect('/list')->with('status', 'Category deleted successfully.');
    }
}


