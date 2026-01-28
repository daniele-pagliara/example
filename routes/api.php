<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::get('/test-dati', function (Request $request) {
//     dd($request->all()); //   dd sta per dump and die, una funzione di debug 
//     // che stampa i dati e ferma l'esecuzione
// });
