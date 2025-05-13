<?php

namespace App\Http\Controllers;

use App\Models\Suppliers;
use App\Models\Accounts;
use Illuminate\Http\Request;

class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Suppliers::all();
        $accounts = Accounts::where('is_main',0)->where('status',1)->get();
        return view('sys_setup.suppliers', compact('suppliers', 'accounts'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Suppliers::create([
            'name' => $request->name,
            'account_id' => $request->account_id,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'created_by' => auth()->user()->id,
        ]);
        return redirect()->route('suppliers')->with('success', 'تم إضافة المورد بنجاح');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $supplier = Suppliers::find($id);
        $accounts = Accounts::where('is_main',0)->where('status',1)->get();
        return view('sys_setup.edit.suppliers_edit', compact('supplier', 'accounts'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $supplier = Suppliers::find($request->id);
        $supplier->update([
            'name' => $request->name,
            'account_id' => $request->account_id,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'updated_by' => auth()->user()->id,
        ]);
        return redirect()->route('suppliers')->with('success', 'تم تعديل المورد بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $supplier = Suppliers::find($id);
        $supplier->delete();
        return redirect()->route('suppliers')->with('success', 'تم حذف المورد بنجاح');
    }
}
