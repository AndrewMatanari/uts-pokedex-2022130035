<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PokemonController;
use App\Http\Controllers\PokedexController;



Route::get('/', [PokedexController::class, 'index'])->name('home');
Route::get('/pokedex', [PokedexController::class, 'index'])->name('pokedex.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('pokemon', PokemonController::class);

