<?php

namespace App\Http\Controllers;

use App\Http\Requests\MonumentoRequest;
use App\Models\Monumento;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Provincia;

class MonumentoController extends Controller
{

    public function crud(){
      $users=User::all();
      $monumentos = Monumento::all();
      $provincias = Provincia::all();
      return view('crud',compact('monumentos','users','provincias'));
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $user=User::all();
      $monumentos=Monumento::all();
      // $monumentos = Monumento::with('provincia')->get();
      return view('monumentos.index', compact('monumentos','user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      $monumentos = Monumento::all();
      $users=User::all();
      $provincias = DB::table('provincias')->get();
      return view('monumentos.create', compact('provincias','users','monumentos'));  //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MonumentoRequest $request)
    {
      dd($request);
      Monumento::create($request->all());

      return redirect()->route('monumentos.index')->with('success', __('Monument created successfully'));
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
    public function update(Request $request, Monumento $monumento)
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
