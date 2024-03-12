<?php

namespace App\Http\Controllers;

use App\Models\Monumento;
use Illuminate\Http\Request;

class MonumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $monumentos = Monumento::all(); 

        return response()->json($monumentos);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            // Agrega aquí las validaciones necesarias para los campos de monumento
        ]);

        $monument = Monumento::create($validatedData);

        return response()->json($monument, 201);
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
    public function show(Monumento $monument)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Monumento $monument)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Monumento $monument)
    {
        $validatedData = $request->validate([
            
            
        ]);

        $monument->update($validatedData);

        return response()->json($monument, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Monumento $monument)
    {
        $monument->delete();

        return response()->json(null, 204);
    }
}
