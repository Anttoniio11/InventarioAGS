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



// Mostrar la lista de áreas
Route::get('areas', [AreaController::class, 'index'])->name('areas.index');
// Mostrar el formulario para crear una nueva área
Route::get('areas/create', [AreaController::class, 'create'])->name('areas.create');
// Almacenar una nueva área
Route::post('areas', [AreaController::class, 'store'])->name('areas.store');
// Mostrar una área específica
Route::get('areas/{id}', [AreaController::class, 'show'])->name('areas.show');
// Mostrar el formulario para editar un área existente
Route::get('areas/{id}/edit', [AreaController::class, 'edit'])->name('areas.edit');
// Actualizar un área existente
Route::put('areas/{id}', [AreaController::class, 'update'])->name('areas.update');
// Eliminar un área específica
Route::delete('areas/{id}', [AreaController::class, 'destroy'])->name('areas.destroy');
// Buscar áreas
Route::get('buscar-areas', [AreaController::class, 'buscarAreas'])->name('areas.buscar');



// Mostrar la lista de sedes
Route::get('sedes', [SedeController::class, 'index'])->name('sedes.index');
// Mostrar el formulario para crear una nueva sede
Route::get('sedes/create', [SedeController::class, 'create'])->name('sedes.create');
// Almacenar una nueva sede
Route::post('sedes', [SedeController::class, 'store'])->name('sedes.store');
// Mostrar una sede específica
Route::get('sedes/{id}', [SedeController::class, 'show'])->name('sedes.show');
// Mostrar el formulario para editar una sede existente
Route::get('sedes/{id}/edit', [SedeController::class, 'edit'])->name('sedes.edit');
// Actualizar una sede existente
Route::put('sedes/{id}', [SedeController::class, 'update'])->name('sedes.update');
// Eliminar una sede específica
Route::delete('sedes/{id}', [SedeController::class, 'destroy'])->name('sedes.destroy');
// Buscar sedes
Route::get('buscar-sedes', [SedeController::class, 'buscarSedes'])->name('sedes.buscar');



//=============================================================
//                     RUTAS CATEGORIAS
//=============================================================



// Mostrar la lista de categorías tecnológicas
Route::get('categorias-tecnologicos', [CategoriaTecnologicoController::class, 'index'])->name('categorias-tecnologicos.index');
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


// Mostrar la lista de categorías físicas
Route::get('categorias-fisicos', [CategoriaFisicoController::class, 'index'])->name('categorias-fisicos.index');
// Mostrar el formulario para crear una nueva categoría física
Route::get('categorias-fisicos/create', [CategoriaFisicoController::class, 'create'])->name('categorias-fisicos.create');
// Almacenar una nueva categoría física
Route::post('categorias-fisicos', [CategoriaFisicoController::class, 'store'])->name('categorias-fisicos.store');
// Mostrar una categoría física específica
Route::get('categorias-fisicos/{id}', [CategoriaFisicoController::class, 'show'])->name('categorias-fisicos.show');
// Mostrar el formulario para editar una categoría física existente
Route::get('categorias-fisicos/{id}/edit', [CategoriaFisicoController::class, 'edit'])->name('categorias-fisicos.edit');
// Actualizar una categoría física existente
Route::put('categorias-fisicos/{id}', [CategoriaFisicoController::class, 'update'])->name('categorias-fisicos.update');
// Eliminar una categoría física específica
Route::delete('categorias-fisicos/{id}', [CategoriaFisicoController::class, 'destroy'])->name('categorias-fisicos.destroy');
// Buscar categorías físicas
Route::get('buscar-categorias-fisicos', [CategoriaFisicoController::class, 'buscarCategorias'])->name('categorias-fisicos.buscar');


// Mostrar la lista de categorías médicas
Route::get('categorias-medicos', [CategoriaMedicoController::class, 'index'])->name('categorias-medicos.index');
// Mostrar el formulario para crear una nueva categoría médica
Route::get('categorias-medicos/create', [CategoriaMedicoController::class, 'create'])->name('categorias-medicos.create');
// Almacenar una nueva categoría médica
Route::post('categorias-medicos', [CategoriaMedicoController::class, 'store'])->name('categorias-medicos.store');
// Mostrar una categoría médica específica
Route::get('categorias-medicos/{id}', [CategoriaMedicoController::class, 'show'])->name('categorias-medicos.show');
// Mostrar el formulario para editar una categoría médica existente
Route::get('categorias-medicos/{id}/edit', [CategoriaMedicoController::class, 'edit'])->name('categorias-medicos.edit');
// Actualizar una categoría médica existente
Route::put('categorias-medicos/{id}', [CategoriaMedicoController::class, 'update'])->name('categorias-medicos.update');
// Eliminar una categoría médica específica
Route::delete('categorias-medicos/{id}', [CategoriaMedicoController::class, 'destroy'])->name('categorias-medicos.destroy');
// Buscar categorías médicas
Route::get('buscar-categorias-medicos', [CategoriaMedicoController::class, 'buscarCategorias'])->name('categorias-medicos.buscar');


// Mostrar la lista de categorías de insumos
Route::get('categorias-insumos', [CategoriaInsumoController::class, 'index'])->name('categorias-insumos.index');
// Mostrar el formulario para crear una nueva categoría de insumo
Route::get('categorias-insumos/create', [CategoriaInsumoController::class, 'create'])->name('categorias-insumos.create');
// Almacenar una nueva categoría de insumo
Route::post('categorias-insumos', [CategoriaInsumoController::class, 'store'])->name('categorias-insumos.store');
// Mostrar una categoría de insumo específica
Route::get('categorias-insumos/{id}', [CategoriaInsumoController::class, 'show'])->name('categorias-insumos.show');
// Mostrar el formulario para editar una categoría de insumo existente
Route::get('categorias-insumos/{id}/edit', [CategoriaInsumoController::class, 'edit'])->name('categorias-insumos.edit');
// Actualizar una categoría de insumo existente
Route::put('categorias-insumos/{id}', [CategoriaInsumoController::class, 'update'])->name('categorias-insumos.update');
// Eliminar una categoría de insumo específica
Route::delete('categorias-insumos/{id}', [CategoriaInsumoController::class, 'destroy'])->name('categorias-insumos.destroy');
// Buscar categorías de insumos
Route::get('buscar-categorias-insumos', [CategoriaInsumoController::class, 'buscarCategorias'])->name('categorias-insumos.buscar');




