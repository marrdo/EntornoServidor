<?php

use App\Http\Controllers\MonumentoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProvinciaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::resource('/provincia', ProvinciaController::class);

// Route::middleware(['auth','admin'])->group(function(){
//     Route::resource('/monumento', MonumentoController::class)->only(['create','store']);
// });

Route::get('/monumento', [MonumentoController::class,'index'])->name('monumento.index');

Route::middleware(['auth','verified'])->group(function(){
    Route::resource('/monumento', MonumentoController::class)->only(['create','store']);
});