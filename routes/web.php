<?php

use App\Http\Controllers\Api\MntPacienteController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/registro', function(){
    return view('auth/registro');
});

Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('/dashboard');
    })->name('/dashboard');

    Route::get('/pacientes', [MntPacienteController::class, 'index'])->name('paientes.index');
});
Route::post('/logout', [UserController::class, 'logout'])->name('logout');