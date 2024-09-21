<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;

class UnitController extends Controller
{
    //
    public function addUnit(){
        return view('admin.unit.add');
    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required|max:255',
            'status'=>'required|in:active,inactive',
    ]);
    Unit::create($request->all());
    if($request->has('save_and_add_another')){
        return redirect()->route('unit.add')->with('status', 'Unit saved. You can add another.');
    }
        return redirect()->route('unit.list')->with('status','Unit saved Successfully');
    }

    public function list(){
        $units=unit::all();
        return view('admin.unit.list',compact('units'));
    }

    public function edit($id){
        $unit=unit::findorfail($id);
        return view('admin.unit.edit',compact('unit'));
    }

    public function update(Request $request, $id)
{
    // Validate the request data
    $request->validate([
        'name' => 'required|string|max:255',
        'status' => 'required|in:active,inactive',
    ]);

    // Find the unit and update it
    $unit = Unit::findOrFail($id);
    $unit->update($request->all());

    return redirect()->route('unit.list')->with('status', 'Unit updated successfully.');
}
    public function destroy($id)
    {
        $unit = unit::findOrFail($id);
        $unit->delete();

        return redirect()->route('unit.list')->with('status', 'Category deleted successfully.');
    }
    }

