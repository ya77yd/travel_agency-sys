<?php

namespace App\Http\Controllers;

use App\Models\Currencies;
use Illuminate\Http\Request;

class CurrenciesController extends Controller
{
    public function index()
    {
        $currencies = Currencies::all();
        return view('sys_setup.currencies', compact('currencies'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Currencies::create([
            'name' => $request->name,
            'code' => $request->code,
            'exchange_rate' => $request->exchange_rate,
            'created_by' => auth()->id(),
        ]);
        return redirect()->route('currencies')->with('success', 'تم إضافة العملة بنجاح');
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
    public function edit($id)
    {
        $currency = Currencies::find($id);
        return view('sys_setup.edit.currencies_edit', compact('currency'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $currency = Currencies::find($request->id);
        $currency->update([
            'name' => $request->name,
            'code' => $request->code,
            'exchange_rate' => $request->exchange_rate,
            'updated_by' => auth()->id(),
        ]);
        return redirect()->route('currencies')->with('success', 'تم تعديل العملة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $currency = Currencies::find($id);
        $currency->delete();
        return redirect()->route('currencies')->with('success', 'تم حذف العملة بنجاح');
    }
}
