<?php

use App\Http\Controllers\MonumentController;
use App\Models\Monument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Ruta para obtener el listado de monumentos (lectura)
Route::get('/monuments', [MonumentController::class,'index']);

// Creacion del Token Documentacion
Route::post('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken($request->token_name);
 
    return ['token' => $token->plainTextToken];
});

// Rutas protegidas
Route::middleware('auth:sanctum')->group(function () {
    // Crear un nuevo monumento
    Route::post('/monuments/create', [MonumentController::class,'create']);

    // Actualizar un monumento existente
    Route::put('/monuments/{monument}', [MonumentController::class,'update']);

    // Borrar un monumento existente
    Route::delete('/monuments/{monument}', [MonumentController::class,'destroy']);
});

// https://laravel.com/docs/10.x/sanctum#issuing-api-tokens
