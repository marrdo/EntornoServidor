<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMonumentoRequest;
use App\Http\Requests\UpdateMonumentoRequest;
use App\Models\Monumento;
use App\Models\Provincia;
use Illuminate\Http\Request;

class MonumentoController extends Controller
{
    /**
     * Muestra una lista de recursos (monumentos).
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Obtenemos todas las provincias
        $provincias = Provincia::all();
        
        // Obtenemos todos los monumentos
        $monumentos = Monumento::all();
        
        // Retornamos la vista 'monumento.index' con los datos de los monumentos y las provincias
        return view('monumento.index')->with([
            'monumentos' => $monumentos,
            'provincias' => $provincias,
            'monumentos_json' => $monumentos->toJson(),
            'provincias_json' => $provincias->toJson()
        ]);

        // return response()->json([
        //     'monumentos'=> $monumentos,
        //     'provincias'=> $provincias
        // ]);
    }

    /**
     * Muestra el formulario para crear un nuevo recurso (monumento).
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Obtenemos todas las provincias
        $provincias = Provincia::all();
        
        // Retornamos la vista 'monumento.create' con los datos de las provincias
        return view('monumento.create', compact('provincias'));
    }

    /**
     * Almacena un recurso recién creado (monumento) en el almacenamiento.
     *
     * @param  \App\Http\Requests\StoreMonumentoRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreMonumentoRequest $request)
    {
        // Validamos los datos enviados en el formulario utilizando la clase StoreMonumentoRequest
        $validatedData = $request->validated();
        // dd($validatedData);
        // Creamos un nuevo monumento con los datos validados y lo guardamos en la base de datos
        Monumento::create($validatedData); 
        
        // Redirigimos al usuario a la página de índice de monumentos con un mensaje de éxito
        return redirect()->route('monumento.index')->with('success', 'Monumento registrado correctamente');
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
