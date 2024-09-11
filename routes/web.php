<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\SedeController;
use App\Http\Controllers\CategoriaTecnologicoController;
use App\Http\Controllers\CategoriaFisicoController;
use App\Http\Controllers\CategoriaMedicoController;
use App\Http\Controllers\CategoriaInsumoController;

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
    return view('welcome');
});



Route::get('areas', [AreaController::class, 'index'])->name('areas.index');
Route::get('areas/create', [AreaController::class, 'create'])->name('areas.create');
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


//=============================================================
//                     RUTAS CATEGORIAS
//=============================================================


// Mostrar la lista de categorías tecnológicas
Route::get('categorias-tecnologicos/index', [CategoriaTecnologicoController::class, 'index'])->name('categorias-tecnologicos.index');
// Mostrar el formulario para crear una nueva categoría tecnológica
Route::get('categorias-tecnologicos/create', [CategoriaTecnologicoController::class, 'create'])->name('categorias-tecnologicos.create');
// Almacenar una nueva categoría tecnológica
Route::post('categorias-tecnologicos', [CategoriaTecnologicoController::class, 'store'])->name('categorias-tecnologicos.store');
// Mostrar una categoría tecnológica específica
Route::get('categorias-tecnologicos/{id}', [CategoriaTecnologicoController::class, 'show'])->name('categorias-tecnologicos.show');
// Mostrar el formulario para editar una categoría tecnológica existente
Route::get('categorias-tecnologicos/{id}/edit', [CategoriaTecnologicoController::class, 'edit'])->name('categorias-tecnologicos.edit');
// Actualizar una categoría tecnológica existente
Route::put('categorias-tecnologicos/{id}', [CategoriaTecnologicoController::class, 'update'])->name('categorias-tecnologicos.update');
// Eliminar una categoría tecnológica específica
Route::delete('categorias-tecnologicos/{id}', [CategoriaTecnologicoController::class, 'destroy'])->name('categorias-tecnologicos.destroy');
// Buscar categorías tecnológicas
Route::get('buscar-categorias-tecnologicos', [CategoriaTecnologicoController::class, 'buscarCategorias'])->name('categorias-tecnologicos.buscar');


Route::get('categorias-fisicos', [CategoriaFisicoController::class, 'index'])->name('categorias-fisicos.index');
Route::get('categorias-fisicos/create', [CategoriaFisicoController::class, 'create'])->name('categorias-fisicos.create');
Route::post('categorias-fisicos', [CategoriaFisicoController::class, 'store'])->name('categorias-fisicos.store');
Route::get('categorias-fisicos/{id}', [CategoriaFisicoController::class, 'show'])->name('categorias-fisicos.show');
Route::get('categorias-fisicos/{id}/edit', [CategoriaFisicoController::class, 'edit'])->name('categorias-fisicos.edit');
Route::put('categorias-fisicos/{id}', [CategoriaFisicoController::class, 'update'])->name('categorias-fisicos.update');
Route::delete('categorias-fisicos/{id}', [CategoriaFisicoController::class, 'destroy'])->name('categorias-fisicos.destroy');
Route::get('buscar-categorias-fisicos', [CategoriaFisicoController::class, 'buscarCategorias'])->name('categorias-fisicos.buscar');


Route::get('categorias-medicos', [CategoriaMedicoController::class, 'index'])->name('categorias-medicos.index');
Route::get('categorias-medicos/create', [CategoriaMedicoController::class, 'create'])->name('categorias-medicos.create');
Route::post('categorias-medicos', [CategoriaMedicoController::class, 'store'])->name('categorias-medicos.store');
Route::get('categorias-medicos/{id}', [CategoriaMedicoController::class, 'show'])->name('categorias-medicos.show');
Route::get('categorias-medicos/{id}/edit', [CategoriaMedicoController::class, 'edit'])->name('categorias-medicos.edit');
Route::put('categorias-medicos/{id}', [CategoriaMedicoController::class, 'update'])->name('categorias-medicos.update');
Route::delete('categorias-medicos/{id}', [CategoriaMedicoController::class, 'destroy'])->name('categorias-medicos.destroy');
Route::get('buscar-categorias-medicos', [CategoriaMedicoController::class, 'buscarCategorias'])->name('categorias-medicos.buscar');


Route::get('categorias-insumos', [CategoriaInsumoController::class, 'index'])->name('categorias-insumos.index');
Route::get('categorias-insumos/create', [CategoriaInsumoController::class, 'create'])->name('categorias-insumos.create');
Route::post('categorias-insumos', [CategoriaInsumoController::class, 'store'])->name('categorias-insumos.store');
Route::get('categorias-insumos/{id}', [CategoriaInsumoController::class, 'show'])->name('categorias-insumos.show');
Route::get('categorias-insumos/{id}/edit', [CategoriaInsumoController::class, 'edit'])->name('categorias-insumos.edit');
Route::put('categorias-insumos/{id}', [CategoriaInsumoController::class, 'update'])->name('categorias-insumos.update');
Route::delete('categorias-insumos/{id}', [CategoriaInsumoController::class, 'destroy'])->name('categorias-insumos.destroy');
Route::get('buscar-categorias-insumos', [CategoriaInsumoController::class, 'buscarCategorias'])->name('categorias-insumos.buscar');




