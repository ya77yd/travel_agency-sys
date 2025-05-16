<?php

namespace App\Http\Controllers;

use App\Models\Tickets;
use App\Models\Bookings;
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
        $booking = Bookings::find($tickets->booking_id);
        $b['price'] = $booking->price -$tickets->price;
        $b['price'] += $request->price;
        $b['sale_price'] = $booking->sale_price -$tickets->sale;
        $b['sale_price'] += $request->sale;
        $booking->update($b);
        $tickets->update([
            'name' => $request->name,
            'tkt' => $request->tkt,
            'age' => $request->age,
            'price' => $request->price,
            'sale' => $request->sale,
            
            'updated_by' => auth()->user()->id,
           
        ]);
        return redirect()->route('bookings.edit', $booking->id)->with('success', 'تم تعديل التذكرة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tickets = Tickets::find($id);
        if (!$tickets) {
            return redirect()->route('bookings.edit')->with('error', 'Ticket not found.');
        }
        $booking = Bookings::find($tickets->booking_id);
        $b['price'] = $booking->price -$tickets->price;
        $b['sale_price'] = $booking->sale_price -$tickets->sale;
        $booking->update($b);
        $tickets->delete();
        return redirect()->route('bookings.edit', $booking->id)->with('success', 'تم حذف التذكرة بنجاح');
    }
}
