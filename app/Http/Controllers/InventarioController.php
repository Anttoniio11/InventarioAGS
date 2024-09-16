<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Services\InventarioTecnologicoService;
use App\Services\InventarioFisicoService;
use App\Services\InventarioMedicoService;
use App\Services\InventarioInsumoService;

class InventarioController extends Controller
{

    protected $inventarioTecnologicoService, $inventarioFisicoService, $inventarioMedicoService, $inventarioInsumoService;

    public function __construct(InventarioTecnologicoService $inventarioTecnologicoService, InventarioFisicoService $inventarioFisicoService, InventarioMedicoService $inventarioMedicoService, InventarioInsumoService $inventarioInsumoService) {
        $this->inventarioTecnologicoService = $inventarioTecnologicoService;
        $this->inventarioFisicoService = $inventarioFisicoService;
        $this->inventarioMedicoService = $inventarioMedicoService;
        $this->inventarioInsumoService = $inventarioInsumoService;
    }

    public function inventarioTecnologico(){

        $elementosTecnologicos = $this->inventarioTecnologicoService->obtenerInventarioTecnologico();
        $categoriasTecnologicos = $this->inventarioTecnologicoService->obtenerCategoriasTecnologico();

        return view('inventario.tecnologicos.elementos',compact('elementosTecnologicos', 'categoriasTecnologicos'));

    }

    public function inventarioFisico(){

        $elementosFisicos = $this->inventarioFisicoService->obtenerInventarioFisico();
        $categoriasFisicos = $this->inventarioFisicoService->obtenerCategoriasFisico();

        return view('inventario.fisicos.elementos',compact('elementosFisicos', 'categoriasFisicos'));

    }

    public function inventarioMedico(){

        $elementosMedicos = $this->inventarioMedicoService->obtenerInventarioMedico();
        $categoriasMedicos = $this->inventarioMedicoService->obtenerCategoriasMedico();

        return view('inventario.medicos.elementos',compact('elementosMedicos', 'categoriasMedicos'));

    }

    public function inventarioInsumo(){

        $elementosInsumos = $this->inventarioInsumoService->obtenerInventarioInsumo();
        $categoriasInsumos = $this->inventarioInsumoService->obtenerCategoriasInsumo();

        return view('inventario.insumos.elementos',compact('elementosInsumos', 'categoriasInsumos'));

    }


    public function guardarContratos(Request $request) {

        $elementos = json_decode($request->input('datos'), true);

        $resultado = $this->inventarioTecnologicoService->crearElementoTecnologico($elementos);

        return $resultado;
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
