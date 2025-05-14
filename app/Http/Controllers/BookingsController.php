<?php

namespace App\Http\Controllers;

use App\Models\Bookings;
use App\Models\Customers;
use App\Models\Suppliers;
use App\Models\Currencies;
use App\Models\Travelroutes;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class BookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
       $suppliers = Suppliers::all();
        $customers = Customers::all();
        $trips = Travelroutes::all();
        $currencies = Currencies::all();
        $bookings = Bookings::all();
        return view('bookings.bookings', compact('suppliers', 'customers', 'trips', 'currencies', 'bookings'));}

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
        $bookings = Bookings::create([
            'pnr' => $request->pnr,
            'supplier_id' => $request->supplier_id,
            'customer_id' => $request->customer_id,
            'trip_type' => $request->trip_type,
            'price' => 0,
            'sale_price' => 0,
            'notes' => $request->notes,
            'currency' => $request->currency_id,
            'date' => $request->date,
            'created_by' => auth()->id(),
        ]);
        return redirect()->route('bookings')->with('success', 'تم إضافة الحجز بنجاح');
    }
    /**
     * Display the specified resource.
     */
    public function show(Bookings $bookings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bookings $bookings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bookings $bookings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bookings $bookings)
    {
        //
    }
}
