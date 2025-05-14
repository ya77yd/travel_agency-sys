<?php

namespace App\Http\Controllers;

use App\Models\Transporttickets;
use App\Models\Accounts;
use App\Models\Currencies;
use App\Models\Suppliers;
use App\Models\Customers;
use Illuminate\Http\Request;

class TransportticketsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transportTickets = Transporttickets::all();
        $currencies = Currencies::all();
        $suppliers = Suppliers::all();
        $customers = Customers::all();
        return view('bookings.transporttickets', compact('transportTickets', 'currencies', 'suppliers', 'customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Transporttickets::create([
            'name' => $request->name,
            'tkt' => $request->tkt,
            'from' => $request->from,
            'to' => $request->to,
            'date' => $request->date,
            'travel_date' => $request->travel_date,
            'price' => $request->price,
            'sale' => $request->sale,
            'currency' => $request->currency_id,
            'supplier_id' => $request->supplier_id,
            'customer_id' => $request->customer_id,
            'type' => $request->type,
            'return' => $request->return,
            'created_by' => auth()->id(),
        ]);
        return redirect()->route('transporttickets')->with('success', 'تم إضافة تذكرة النقل بنجاح');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $transportTicket = Transporttickets::find($id);
        $currencies = Currencies::all();
        $suppliers = Suppliers::all();
        $customers = Customers::all();
        return view('bookings.edit.transporttickets_edit', compact('transportTicket', 'currencies', 'suppliers', 'customers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $transportTicket = Transporttickets::find($request->id);
        $transportTicket->update([
            'name' => $request->name,
            'tkt' => $request->tkt,
            'from' => $request->from,
            'to' => $request->to,
            'date' => $request->date,
            'travel_date' => $request->travel_date,
            'price' => $request->price,
            'sale' => $request->sale,
            'currency_id' => $request->currency_id,
            'supplier_id' => $request->supplier_id,
            'customer_id' => $request->customer_id,
            'type' => $request->type,
            'return' => $request->return,
        ]);
        return redirect()->route('transporttickets')->with('success', 'تم تعديل تذكرة النقل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $transportTicket = Transporttickets::find($id);
        $transportTicket->delete();
        return redirect()->route('transporttickets')->with('success', 'تم حذف تذكرة النقل بنجاح');
    }
}
