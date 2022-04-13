<?php

use App\Http\Controllers\ActividadController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgramaController;
use App\Models\Programa;
use App\Models\actividades;
use GuzzleHttp\Promise\Create;

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

// Route::get('/programa', function () {
//     return view('programas.index');
// });

Route::resource('programa', ProgramaController::class);

// Route::get('programa', ProgramaController::class)->names('actividad.index');

Route::resource('actividad', ActividadController::class);

Route::get('programa/actividades/{programa_id}', [ActividadController::class, 'actividadesPrueba'])->name('actividadesPrueba');
Route::get('programa/actividades/{programa_id}/detalle', [ActividadController::class, 'detalleActividad'])->name('detalleActividad');

// Route::resource('/programa/create', [ProgramaController::class, 'create']);