<?php

use App\Http\Controllers\ActividadController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgramaController;
use App\Http\Controllers\ResponsableController;
use App\Models\Programa;
use App\Models\actividades;
use App\Models\Responsable;
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

Route::resource('programa', ProgramaController::class);

// Route::get('programa', ProgramaController::class)->names('actividad.index');

Route::resource('actividad', ActividadController::class);
// Route::resource('responsable', ResponsableController::class);

Route::get('programa/actividades/{programa_id}', [ActividadController::class, 'actividadesPrueba'])->name('actividadesPrueba');
Route::get('programa/actividades/{programa_id}/detalles', [ActividadController::class, 'detalleActividad'])->name('detalleActividad');
Route::get('programa/actividades/{programa_id}/crearActividad', [ActividadController::class, 'crearActividad'])->name('crearActividad');

Route::get('programa/actividades/responsables/{actividad_id}', [ResponsableController::class, 'responsablesVista'])->name('responsablesVista');
Route::get('programa/actividades/responsable/{actividad_id}/crearResponsable', [ResponsableController::class, 'crearResponsable'])->name('crearResponsable');
