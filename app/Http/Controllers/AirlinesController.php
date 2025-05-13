<?php

namespace App\Http\Controllers;

use App\Models\Airlines;
use App\Models\User;
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
            'users' => User::all(),
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
            
        ]);
        return redirect()->route('airlines') ->with('success', 'تم إضافة شركة الطيران بنجاح');
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
    public function edit( $id)
    {
        $airline = Airlines::find($id);
        return view('sys_setup.edit.airline_edit', compact('airline')) ;
    
    
        
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
            'updated_by' => auth()->id(),
        ]);
        return redirect()->route('airlines') ->with('success', 'تم تعديل شركة الطيران بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
       Airlines::destroy($id);
        return redirect()->route('airlines') ->with('success', 'تم حذف شركة الطيران بنجاح');
    }
}
