<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMonumentoRequest;
use App\Http\Requests\UpdateMonumentoRequest;
use App\Models\Monumento;
use App\Models\Provincia;

class MonumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $monumentos = Monumento::all();
        return view('monumento.index',compact('monumentos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $provincias = Provincia::all();
        return view('monumento.create', compact('provincias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMonumentoRequest $request)
    {
        Monumento::create($request->all()); 
        return redirect()->route('monumento.index')->with('success', 'Monumento registrado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Monumento $monumento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Monumento $monumento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMonumentoRequest $request, Monumento $monumento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Monumento $monumento)
    {
        //
    }
}
