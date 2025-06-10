<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActividadController;

Route::get('/', [ActividadController::class, 'index'])->name('actividades.index');
Route::post('/actividad', [ActividadController::class, 'store'])->name('actividades.store');
Route::delete('/actividad/{id}', [ActividadController::class, 'destroy'])->name('actividades.destroy');
Route::get('/actividad/{id}/editar', [ActividadController::class, 'edit'])->name('actividades.edit');
Route::put('/actividad/{id}', [ActividadController::class, 'update'])->name('actividades.update');



// Route::get('/', function () {
//     return view('welcome');
// });
