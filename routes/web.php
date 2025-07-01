<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\InterventoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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


Route::get('/interventi/nuovo-completo', [InterventoController::class, 'createWithClient'])->name('interventi.createWithClient');
Route::post('/interventi/nuovo-completo', [InterventoController::class, 'storeWithClient'])->name('interventi.storeWithClient');

Route::resource('clienti', ClientController::class)->middleware('auth');
Route::resource('interventi', InterventoController::class)->middleware('auth');


require __DIR__ . '/auth.php';
