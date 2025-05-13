<?php

namespace App\Http\Controllers;

use App\Models\Accounts;
use Illuminate\Http\Request;

class AccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accounts = Accounts::all();
        return view('sys_setup.accounts', compact('accounts'));
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
        $parent_account = Accounts::where('id', $request->parent_id)->first();
        Accounts::create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'type' => $parent_account->type,
            'level' => $parent_account->level + 1,
            'is_main' => $request->is_main,
            'status' => 1,
            'created_by' => auth()->id(),   // أو: auth()->user()->id
        ]);
        return redirect()->route('accounts')->with('success', 'تم إضافة الحساب بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(Airlines $airlines)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $account = Accounts::find($id);
        $accounts = Accounts::all();
        return view('sys_setup.edit.accounts_edit', compact('account','accounts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $account = Accounts::find($request->id);
        $parent_account = Accounts::where('id', $request->parent_id)->first();
        $account->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'type' => $parent_account->type,
            'level' => $parent_account->level + 1,
            'is_main' => $request->is_main,
            'status' => $request->status,
            'updated_by' => auth()->id(),   // أو: auth()->user()->id
        ]);
        return redirect()->route('accounts')->with('success', 'تم تعديل الحساب بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
             $account = Accounts::find($id);
        $account->delete();
        return redirect()->route('accounts')->with('success', 'تم حذف الحساب بنجاح');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('accounts')->with('error', 'لا يمكن حذف الحساب لأنه مرتبط ببيانات أخرى');
        }
       
    }

}
