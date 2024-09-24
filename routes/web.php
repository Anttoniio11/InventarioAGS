<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\SedeController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ElementosBajaController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\PanelController;

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
    return redirect()->route('panel.index');
});

//Panel
Route::get('/panel', [PanelController::class, 'panel'])->name('panel.index');

//Inventario
Route::get('inventario/tecnologicos',[InventarioController::class,'inventarioTecnologico'])->name('inventarioTecnologico.index');
Route::get('inventario/fisicos',[InventarioController::class,'inventarioFisico'])->name('inventarioFisico.index');
Route::get('inventario/medicos',[InventarioController::class,'inventarioMedico'])->name('inventarioMedico.index');
Route::get('inventario/insumos',[InventarioController::class,'inventarioInsumo'])->name('inventarioInsumo.index');

//Crear Elementos
Route::post('/guardar-elemento-tecnologico', [InventarioController::class, 'guardarElementoTecnologico'])->name('guardar.elemento.tecnologico');
Route::post('/guardar-elemento-fisico', [InventarioController::class, 'guardarElementoFisico'])->name('guardar.elemento.fisico');
Route::post('/guardar-elemento-medico', [InventarioController::class, 'guardarElementoMedico'])->name('guardar.elemento.medico');
Route::post('/guardar-elemento-insumo', [InventarioController::class, 'guardarElementoInsumo'])->name('guardar.elemento.insumo');

//Ver Hoja De Vida Elementos
Route::get('/elementos-tecnologicos/{id}', [InventarioController::class, 'verElementoTecnologico'])->name('elementoTecnologico.ver');
Route::get('/elementos-fisicos/{id}', [InventarioController::class, 'verElementoFisico'])->name('elementoFisico.ver');
Route::get('/elementos-medicos/{id}', [InventarioController::class, 'verElementoMedico'])->name('elementoMedico.ver');
Route::get('/elementos-insumos/{id}', [InventarioController::class, 'verElementoInsumo'])->name('elementoInsumo.ver');

// Ruta para actualizar un Elemento
Route::get('/elemento/tecnologico/editar/{id}', [InventarioController::class, 'obtenerElementoTecnologico'])->name('editar.elemento.tecnologico');
Route::put('/elemento/tecnologico/actualizar/{id}', [InventarioController::class, 'actualizarElementoTecnologico'])->name('actualizar.elemento.tecnologico');
Route::get('/elemento/fisico/editar/{id}', [InventarioController::class, 'obtenerElementoFisico'])->name('editar.elemento.fisico');
Route::put('/elemento/fisico/actualizar/{id}', [InventarioController::class, 'actualizarElementoFisico'])->name('actualizar.elemento.fisico');
Route::get('/elemento/medico/editar/{id}', [InventarioController::class, 'obtenerElementoMedico'])->name('editar.elemento.medico');
Route::put('/elemento/medico/actualizar/{id}', [InventarioController::class, 'actualizarElementoMedico'])->name('actualizar.elemento.medico');
Route::get('/elemento/insumo/editar/{id}', [InventarioController::class, 'obtenerElementoInsumo'])->name('editar.elemento.insumo');
Route::put('/elemento/insumo/actualizar/{id}', [InventarioController::class, 'actualizarElementoInsumo'])->name('actualizar.elemento.insumo');

//Crear Categorias
Route::post('/guardar-categoria-tecnologico', [CategoriaController::class, 'guardarCategoriaTecnologico'])->name('guardar.categoria.tecnologico');
Route::post('/guardar-categoria-fisico', [CategoriaController::class, 'guardarCategoriaFisico'])->name('guardar.categoria.fisico');
Route::post('/guardar-categoria-medico', [CategoriaController::class, 'guardarCategoriaMedico'])->name('guardar.categoria.medico');
Route::post('/guardar-categoria-insumo', [CategoriaController::class, 'guardarCategoriaInsumo'])->name('guardar.categoria.insumo');

//Empleados
Route::get('empleados', [EmpleadoController::class, 'Empleados'])->name('empleados.index');
Route::post('guardar-empleados', [EmpleadoController::class, 'guardarEmpleado'])->name('guardar.empleado');

//Elementos Dados De Baja
Route::get('elementos-baja',[ElementosBajaController::class,'elementosBaja'])->name('elementosBaja.index');







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






