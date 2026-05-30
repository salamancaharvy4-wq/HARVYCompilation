<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PokedexController;

Route::get('/', function () {
    return redirect('/pokedex');
});

Route::get('/pokedex', [PokedexController::class, 'index'])->name('pokedex.index');
Route::get('/pokedex/management', [PokedexController::class, 'management'])->name('pokedex.management');
Route::get('/pokedex/{id}', [PokedexController::class, 'show'])->name('pokedex.show');
Route::post('/pokedex/{id}/upload', [PokedexController::class, 'uploadImage'])->name('pokedex.upload');
Route::post('/pokedex/{id}/delete', [PokedexController::class, 'deleteImage'])->name('pokedex.delete');
