<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
});



Route::middleware(['auth'])->group(function(){
    Route::get('/home',function(){
        return view('home');
    });
});


