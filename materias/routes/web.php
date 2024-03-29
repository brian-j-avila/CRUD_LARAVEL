<?php

use App\Http\Controllers\EstudiantesController;
use App\Http\Controllers\MateriasController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

// Ruta para acceder al listado de materias
Route::resource('materias', MateriasController::class)->middleware('auth');

// Rutas relacionadas con los estudiantes
Route::resource('estudiantes', EstudiantesController::class)->middleware('auth');

// Rutas de autenticación
Auth::routes();

// Ruta de inicio
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Middleware de autenticación para estas rutas
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [EstudiantesController::class, 'index'])->name('home');
});
