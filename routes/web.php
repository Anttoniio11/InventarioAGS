<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\SedeController;
use App\Http\Controllers\CategoriaTecnologicoController;
use App\Http\Controllers\CategoriaFisicoController;
use App\Http\Controllers\CategoriaMedicoController;
use App\Http\Controllers\CategoriaInsumoController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\CategoriaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('panel.panel');
});



Route::get('inventario/tecnologicos',[InventarioController::class,'inventarioTecnologico'])->name('inventarioTecnologico.index');
Route::get('inventario/fisicos',[InventarioController::class,'inventarioFisico'])->name('inventarioFisico.index');
Route::get('inventario/medicos',[InventarioController::class,'inventarioMedico'])->name('inventarioMedico.index');
Route::get('inventario/insumos',[InventarioController::class,'inventarioInsumo'])->name('inventarioInsumo.index');

Route::post('/guardar-elemento-tecnologico', [InventarioController::class, 'guardarElementoTecnologico'])->name('guardar.elemento.tecnologico');
Route::post('/guardar-elemento-fisico', [InventarioController::class, 'guardarElementoFisico'])->name('guardar.elemento.fisico');
Route::post('/guardar-elemento-medico', [InventarioController::class, 'guardarElementoMedico'])->name('guardar.elemento.medico');
Route::post('/guardar-elemento-insumo', [InventarioController::class, 'guardarElementoInsumo'])->name('guardar.elemento.insumo');

// Ruta para obtener un elemento tecnológico por ID
Route::get('/inventario-tecnologico/elemento/{id}', [InventarioController::class, 'obtenerElementoTecnologico'])
    ->name('obtener.elemento.tecnologico');

// Ruta para actualizar un elemento tecnológico por ID
Route::put('/elemento-tecnologico/{id}/actualizar', [InventarioController::class, 'actualizarElementoTecnologico'])
    ->name('actualizar.elemento.tecnologico');

//Ver hoja de vida
Route::get('/elementos-tecnologicos/{id}', [InventarioController::class, 'verElementoTecnologico'])->name('elementoTecnologico.ver');
Route::get('/elementos-fisicos/{id}', [InventarioController::class, 'verElementoFisico'])->name('elementoFisico.ver');
Route::get('/elementos-medicos/{id}', [InventarioController::class, 'verElementoMedico'])->name('elementoMedico.ver');
Route::get('/elementos-insumos/{id}', [InventarioController::class, 'verElementoInsumo'])->name('elementoInsumo.ver');








Route::get('areas', [AreaController::class, 'index'])->name('areas.index');
Route::get('areas/create/tecnlogia', [AreaController::class, 'create'])->name('areas.create');
Route::post('areas', [AreaController::class, 'store'])->name('areas.store');
Route::get('areas/{id}', [AreaController::class, 'show'])->name('areas.show');
Route::get('areas/{id}/edit', [AreaController::class, 'edit'])->name('areas.edit');
Route::put('areas/{id}', [AreaController::class, 'update'])->name('areas.update');
Route::delete('areas/{id}', [AreaController::class, 'destroy'])->name('areas.destroy');
Route::get('buscar-areas', [AreaController::class, 'buscarAreas'])->name('areas.buscar');

Route::get('sedes', [SedeController::class, 'index'])->name('sedes.index');
Route::get('sedes/create', [SedeController::class, 'create'])->name('sedes.create');
Route::post('sedes', [SedeController::class, 'store'])->name('sedes.store');
Route::get('sedes/{id}', [SedeController::class, 'show'])->name('sedes.show');
Route::get('sedes/{id}/edit', [SedeController::class, 'edit'])->name('sedes.edit');
Route::put('sedes/{id}', [SedeController::class, 'update'])->name('sedes.update');
Route::delete('sedes/{id}', [SedeController::class, 'destroy'])->name('sedes.destroy');
Route::get('buscar-sedes', [SedeController::class, 'buscarSedes'])->name('sedes.buscar');






