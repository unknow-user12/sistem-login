<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth.manual')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    });
});

Route::get('/admin', function () {

    return view('dashboard');

})->middleware('role:admin');


Route::get('/user', function () {

    return view('dashboard');

})->middleware('role:user');


Route::middleware('guest.manual')->group(function () {

    Route::get('/login', function () {
        return view('auth.login');
    });

    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', function () {
        return view('auth.register');
    });

    Route::post('/register', [AuthController::class, 'register']);
});


Route::post('/logout', [AuthController::class, 'logout']);