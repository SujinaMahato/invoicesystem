<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Saleterm;

class ManageSaleController extends Controller
{
    public function add(){
        return view('admin.sale.addsaleterm');
    }

    public function store(Request $request){
        $request->validate([
            'terms_and_conditions'=>'required',
            'status'=>'required|in:active,inactive',
        ]);
        Saleterm::create($request->all());
       return redirect()->route('manage.list')->with('status','Sales term added successfully');
    }

    public function list(){
        $saleterms=saleterm::all();
        return view('admin.sale.managesaleterm',compact('saleterms'));

    }
    public function edit($id){
        $saleterm=saleterm::findOrFail($id);
        return view('admin.sale.editterm',compact('saleterm'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'terms_and_conditions'=>'required',
            'status'=>'required|in:active,inactive',
        ]);
        $saleterm=Saleterm::findOrFail($id);
        $saleterm->update($request->all());
        return redirect()->route('manage.list')->with('success','updated Sucessfully');

    }
    public function destroy($id){
        $saleterm=Saleterm::findOrFail($id);
        $saleterm->delete();
        return redirect()->route('manage.list');
    }
}
