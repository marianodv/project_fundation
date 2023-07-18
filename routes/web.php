<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('actividad', App\Http\Controllers\ActividadController::class);

    Route::resource('caja', App\Http\Controllers\CajaController::class);

    Route::get('caja/report/{name}', [App\Http\Controllers\CajaController::class, 'generatePDF'])->name('caja.report');

    Route::resource('concepto', App\Http\Controllers\ConceptoController::class);

    Route::get('concepto/report/{name}', [App\Http\Controllers\ConceptoController::class, 'generatePDF'])->name('concepto.report');

    Route::resource('movimiento', App\Http\Controllers\MovimientoController::class);


    Route::resource('categoria', App\Http\Controllers\CategoriaController::class) -> parameters([
        'categoria' => 'categoria'
    ]);

    Route::resource('user', App\Http\Controllers\UserController::class);

    Route::resource('alumno', App\Http\Controllers\AlumnoController::class);
});


Route::get('/consulta', [App\Http\Controllers\AlumnoController::class, 'individual'])->where('dni', '[0-9]');


Route::get('/alumno-report/{id}', [App\Http\Controllers\AlumnoController::class, 'generatePDF'])->name('alumno.report');

Route::name('alumno.restore')->get('alumno/resto/{alumno}', [App\Http\Controllers\AlumnoController::class, 'restore']);


