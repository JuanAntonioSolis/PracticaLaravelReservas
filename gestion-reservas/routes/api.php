<?php

use App\Http\Resources\SalaResource;
use App\Models\Sala;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Todas las salas
Route::get('/salas', function(){
    return SalaResource::collection(Sala::all());
});

//Una sola sala
Route::get('/salas/{id}', function(string $id){
    return Sala::findorFail($id)->toResource();
});

