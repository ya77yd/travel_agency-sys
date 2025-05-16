<?php

namespace App\Http\Controllers;

use App\Models\Tickets;
use Illuminate\Http\Request;
use PHPUnit\Framework\Attributes\Ticket;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Tickets $tickets)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {   
        $tickets = Tickets::find($id);
        if (!$tickets) {
            return redirect()->route('tickets.index')->with('error', 'Ticket not found.');
        }
        return view('bookings.edit.ticktes_edit', compact('tickets'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $tickets = Tickets::find($request->id);
        if (!$tickets) {
            return redirect()->route('bookings.edit')->with('error', 'Ticket not found.');
        }
        $tickets->update([
            'name' => $request->name,
            'tkt' => $request->tkt,
            'age' => $request->age,
            'price' => $request->price,
            'sale' => $request->sale,
            
            'updated_by' => auth()->user()->id,
           
        ]);
        return redirect()->route('bookings.edit', $request->booking_id)->with('success', 'تم تعديل التذكرة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tickets $tickets)
    {
        //
    }
}
