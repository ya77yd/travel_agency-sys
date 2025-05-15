<?php

namespace App\Http\Controllers;
use App\Models\Payments;
use App\Models\Accounts;
use App\Models\Currencies;

use Illuminate\Http\Request;

class PaymentsController extends Controller
{
     public function index()
    {
        $payments = Payments::all();
        $currencies = Currencies::all();
        $accounts = Accounts::where('is_main', 0)->where('status', 1)->get();
        return view('sys_setup.payments', compact('payments', 'currencies', 'accounts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Payments::create([
            'account_debt' => $request->account_debt,
            'account_credit' => $request->account_credit,
            'currency_id' => $request->currency_id,
            'amount' => $request->amount,
            'type' => $request->type,
            'details' => $request->details,
            'date' => $request->date,
            'created_by' => auth()->id(),
        ]);
        return redirect()->route('payments')->with('success', 'تم إضافة طريقة الدفع بنجاح');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $payment = Payments::find($id);
        $currencies = Currencies::all();
        $accounts = Accounts::where('is_main', 0)->where('status', 1)->get();
        return view('sys_setup.edit.payments_edit', compact('payment', 'currencies', 'accounts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $payment = Payments::find($request->id);
        $payment->update([
            'account_debt' => $request->account_debt,
            'account_credit' => $request->account_credit,
            'currency_id' => $request->currency_id,
            'amount' => $request->amount,
            'type' => $request->type,
            'details' => $request->details,
            'date' => $request->date,
            'updated_by' => auth()->id(),
        ]);
        return redirect()->route('payments')->with('success', 'تم تعديل طريقة الدفع بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $payment = Payments::find($id);
        $payment->delete();
        return redirect()->route('payments')->with('success', 'تم حذف طريقة الدفع بنجاح');
    }
}
