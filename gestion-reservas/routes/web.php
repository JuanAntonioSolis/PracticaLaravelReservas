<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
});

Route::get('/registro', function () {
    return view('registro.index');
});

Route::get('/login', function () {
    return view('login.index');
});
