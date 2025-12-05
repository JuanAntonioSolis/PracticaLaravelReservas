<?php

use App\Http\Controllers\ReservaController;
use App\Http\Resources\SalaResource;
use App\Models\Reserva;
use App\Models\Sala;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


//RUTA PARA GENERAR TOKEN //////////////////////////////////////////////////////////////////
Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    //Comprobar credenciales
    if (!Auth::attempt($credentials)) {
        abort(401);
    }

    $token = Auth::user()->createToken('my-app-token')->plainTextToken;

    return response()->json(['token' => $token, 'user' => Auth::user()]);
});

//RUTAS PROTEGIDAS /////////////////////////////////////////////////////////////////////////
Route::middleware(['auth:sanctum'])->group(function () {
    //Todas las salas
    Route::get('/salas', [ReservaController::class, 'apiGetSalas']);

    //Una sola sala
    Route::get('/salas/{id}', [ReservaController::class, 'apiGetSalaById']);

    //Todas las reservas desde admin
    Route::get('/reservas/admin', [ReservaController::class,'apiGetReservasAdmin']);

    //Todas tus reservas (usuario logueado)
    Route::get('/reservas', [ReservaController::class, 'apiGetReservasUser']);

    //Una sola reserva, si es tuya te deja verla, si no te bloquea
    Route::get('/reservas/{id}', [ReservaController::class, 'apiGetReservaById']);

    //Crear una reserva
    Route::post('/reservas', [ReservaController::class, 'apiNewReserva']);

    //Cancelar una reserva sólo si es tuya
    Route::put('/reservas/{id}', [ReservaController::class, 'apiUpdateReserva']);

    //Borrar una reserva sólo si es tuya
    Route::delete('/reservas/{id}', [ReservaController::class, 'apiDeleteReserva']);

});
