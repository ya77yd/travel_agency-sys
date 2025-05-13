<?php

namespace App\Http\Controllers;

use App\Models\Airports;
use Illuminate\Http\Request;

class AirportsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $airports = Airports::all();
        return view('sys_setup.airports', compact('airports'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Airports::create([
            'code' => $request->code,
            'country' => $request->country,
            'city' => $request->city,
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'created_by' => auth()->id(),   // أو: auth()->user()->id
            'updated_by' => auth()->id(),   // نفس الإنشاء أول مرة
        ]);
        return redirect()->route('airports')->with('success', 'تم إضافة المطار بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(Airports $airports)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $airport = Airports::find($id);
        return view('sys_setup.airports_edit', compact('airport'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $airport = Airports::find($request->id);
        $airport->update([
            'code' => $request->code,
            'country' => $request->country,
            'city' => $request->city,
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'updated_by' => auth()->id(),
        ]);
        return redirect()->route('airports')->with('success', 'تم تعديل المطار بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Airports::destroy($id);
        return redirect()->route('airports')->with('success', 'تم حذف المطار بنجاح');
    }
}
