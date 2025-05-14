<?php

namespace App\Http\Controllers;
use App\Models\Account_currencies;
use App\Models\Accounts;
use App\Models\Currencies;

use Illuminate\Http\Request;

class Account_currenciesController extends Controller
{
      /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $account_currencies = Account_currencies::where('account_id', '!=', 6)->where('account_id', '!=', 7)->get();
        $accounts = Accounts::where('is_main',0)->where('status',1)->get();
        $currencies = Currencies::all();

        return view('sys_setup.account_currencies', compact('account_currencies', 'accounts', 'currencies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Account_currencies::create([
            'account_id' => $request->account_id,
            'currency_id' => $request->currency_id,
            'debtor' => $request->debtor,
            'creditor' => $request->creditor,
            'is_active' => 1,
            'limit' => $request->limit,
            'created_by' => auth()->user()->id,
        ]);
        return redirect()->route('account_currencies')->with('success', 'تم إضافة الحساب بنجاح');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $account_currency = Account_currencies::find($id);
        $accounts = Accounts::where('is_main',0)->where('status',1)->get();
        $currencies = Currencies::all();

        return view('sys_setup.edit.account_currencies_edit', compact('account_currency', 'accounts', 'currencies'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $account_currency = Account_currencies::find($request->id);
        $account_currency->update([
            'account_id' => $request->account_id,
            'currency_id' => $request->currency_id,
            'debtor' => $request->debtor,
            'creditor' => $request->creditor,
            'is_active' => $request->is_active,
            'limit' => $request->limit,
            'updated_by' => auth()->user()->id,
        ]);
        return redirect()->route('account_currencies')->with('success', 'تم تعديل الحساب بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $account_currency = Account_currencies::find($id);
        $account_currency->delete();
        return redirect()->route('account_currencies')->with('success', 'تم حذف الحساب بنجاح');
    }
}
