<?php

namespace App\Http\Controllers;

use App\Services\InventarioService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class InventarioController extends Controller
{

    protected $inventarioService;

    public function __construct(InventarioService $inventarioService) {
        $this->inventarioService = $inventarioService;
    }

    public function inventarioTecnologico(){

        $elementosTecnologicos = $this->inventarioService->obtenerInventarioTecnologico();
        $categoriasTecnologicos = $this->inventarioService->obtenerCategoriasTecnologico();

        return view('inventario.tecnologicos.elementos',compact('elementosTecnologicos', 'categoriasTecnologicos'));

        }

    public function inventarioFisico(){

        $elementosFisicos = $this->inventarioService->obtenerInventarioFisico();
        $categoriasFisicos = $this->inventarioService->obtenerCategoriasFisico();

        return view('inventario.fisicos.elementos',compact('elementosFisicos', 'categoriasFisicos'));

        }

    public function inventarioMedico(){

        $elementosMedicos = $this->inventarioService->obtenerInventarioMedico();
        $categoriasMedicos = $this->inventarioService->obtenerCategoriasMedico();

        return view('inventario.medicos.elementos',compact('elementosMedicos', 'categoriasMedicos'));

        }

    public function inventarioInsumo(){

        $elementosInsumos = $this->inventarioService->obtenerInventarioInsumo();
        $categoriasInsumos = $this->inventarioService->obtenerCategoriasInsumo();

        return view('inventario.insumos.elementos',compact('elementosInsumos', 'categoriasInsumos'));

        }

        public function getFields($table)
    {
        try {
            // Verifica si la tabla existe
            if (!Schema::hasTable($table)) {
                return response()->json(['error' => 'Table not found'], 404);
            }

            // Obtiene los nombres de las columnas de la tabla
            $columns = DB::getSchemaBuilder()->getColumnListing($table);

            // Filtra 'id' y timestamps
            $filteredColumns = array_filter($columns, function($column) {
                return !in_array($column, ['id', 'created_at', 'updated_at']);
            });

            return response()->json(array_values($filteredColumns));
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred'], 500);
        }
    }
}
