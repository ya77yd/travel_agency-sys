<?php

namespace App\Http\Controllers;

use App\Models\Airlines;
use Illuminate\Http\Request;

class AirlinesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('sys_setup.airlines', [
            'airlines' => Airlines::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Airlines::create([
            'code' => $request->code,
            'country' => $request->country,
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'created_by' => auth()->id(),
            'updated_by' => auth()->id(),
        ]);
        return redirect()->route('airlines');
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
    public function edit(Airlines $id)
    {
        $airline = Airlines::find($id);
        return view('sys_setup.edit.airline_edit', compact('airline'));
    
    
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
       $airline= Airlines::find($request->id);   
        $airline->update([
            'code' => $request->code,
            'country' => $request->country,
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'updated_by' => '1',
        ]);
        return redirect()->route('airlines');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Airlines $id)
    {
       Airlines::destroy($id);
        return redirect()->route('airlines');
    }
}
