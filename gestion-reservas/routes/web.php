<?php

use App\Http\Controllers\ReservaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
});


//Rutas protegidas por login
Route::middleware(['auth'])->group(function(){

    //Una vez logueado o registrado
    Route::get('/home',function(){
        return view('home');
    })->name('home');

    //Mostrar reservas propias
    Route::get('/mis-reservas',[ReservaController::class,'index'])->name('mis_reservas');

    //Mostrar form, nueva reserva
    Route::get('/nueva-reserva', [ReservaController::class, 'new'])->name('nueva_reserva');

    //Buscar disponibilidad para una nueva reserva
    Route::post('/buscar-disponibilidad', [ReservaController::class, 'buscarDisponibilidad'])->name('reservas.buscar');

    //Almacenar una nueva reserva
    Route::post('/reservas', [ReservaController::class, 'store'])->name('reservas.store');

    //Cancelar una reserva
    Route::get('/reservas/{reserva}/cancelar', [ReservaController::class, 'cancelar'])->name('reservas.cancelar');
});

//Rutas protegidas por login y admin
Route::middleware(['auth','admin'])->group(function(){
    //Revisar reservas pendientes
    Route::get('/reservas/pendientes',[ReservaController::class,'pendientes'])->name('reservas.pendientes');

    //Filtrar reservas
    Route::post('/reservas/filtrar',[ReservaController::class,'filtrar'])->name('reservas.filtrar');

    //Confirmar una reserva
    Route::get('/reservas/{reserva}/confirmar', [ReservaController::class, 'confirmar'])->name('reservas.confirmar');

});


