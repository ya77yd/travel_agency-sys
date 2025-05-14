<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\Accounts;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users=User::all();
        $customers =Customers::all();
        $accounts = Accounts::where('is_main',0)->where('status',1)->get();
        return View ('sys_setup.customers',compact('accounts','customers','users'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    Customers::create([
            'name' => $request->name,
            'account_id' => $request->account_id,
            'address' => $request->address,
            'phone' => $request->phone,
            'id_card' => $request->id_card,
            'created_by' => auth()->user()->id,
        ]);
        return redirect()->route('customers')->with('success', 'تم إضافة العميل بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customers $customers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $customer = Customers::find($id);
        $accounts = Accounts::where('is_main',0)->where('status',1)->get();
        return view('sys_setup.edit.customer_edit', compact('customer', 'accounts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(request $request )
    {
         $customer = Customers::find($request->id);
        $customer->update([
            'name' => $request->name,
            'account_id' => $request->account_id,
            'address' => $request->address,
            'phone' => $request->phone,
            'id_card' => $request->id_card,
            'updated_by' => auth()->user()->id,
        ]);
        return redirect()->route('customers')->with('success', 'تم تعديل بيانات العميل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
         $customer = Customers::find($id);
        $customer->delete();
        return redirect()->route('customers')->with('success', 'تم حذف بيانات العميل بنجاح');
    }
}
