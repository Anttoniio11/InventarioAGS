<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Services\InventarioTecnologicoService;
use App\Services\InventarioFisicoService;
use App\Services\InventarioMedicoService;
use App\Services\InventarioInsumoService;
use App\Models\ElementoTecnologico;
use App\Models\ElementoFisico;
use App\Models\ElementoMedico;
use App\Models\ElementoInsumo;

class InventarioController extends Controller
{

    protected $inventarioTecnologicoService, $inventarioFisicoService, $inventarioMedicoService, $inventarioInsumoService;

    public function __construct(InventarioTecnologicoService $inventarioTecnologicoService, InventarioFisicoService $inventarioFisicoService, InventarioMedicoService $inventarioMedicoService, InventarioInsumoService $inventarioInsumoService)
    {
        $this->inventarioTecnologicoService = $inventarioTecnologicoService;
        $this->inventarioFisicoService = $inventarioFisicoService;
        $this->inventarioMedicoService = $inventarioMedicoService;
        $this->inventarioInsumoService = $inventarioInsumoService;
    }

    public function inventarioTecnologico()
    {
        $elementosTecnologicos = $this->inventarioTecnologicoService->obtenerInventarioTecnologico();
        $categoriasTecnologicos = $this->inventarioTecnologicoService->obtenerCategoriasTecnologico();

        $datos = $this->inventarioTecnologicoService->obtenerDatosForaneos();

        return view('inventario.tecnologicos.elementos', [
            'elementosTecnologicos' => $elementosTecnologicos,
            'categoriasTecnologicos' => $categoriasTecnologicos,
            'empleados' => $datos['empleados'],
            'areas' => $datos['areas'],
            'sedes' => $datos['sedes'],
            'facturas' => $datos['facturas'],
            'categorias' => $datos['categorias'],
            'estados' => $datos['estados'],
        ]);
    }




    public function inventarioFisico(){

        $elementosFisicos = $this->inventarioFisicoService->obtenerInventarioFisico();
        $categoriasFisicos = $this->inventarioFisicoService->obtenerCategoriasFisico();

        return view('inventario.fisicos.elementos', compact('elementosFisicos', 'categoriasFisicos'));
    }

    public function inventarioMedico()
    {

        $elementosMedicos = $this->inventarioMedicoService->obtenerInventarioMedico();
        $categoriasMedicos = $this->inventarioMedicoService->obtenerCategoriasMedico();

        return view('inventario.medicos.elementos', compact('elementosMedicos', 'categoriasMedicos'));
    }

    public function inventarioInsumo()
    {

        $elementosInsumos = $this->inventarioInsumoService->obtenerInventarioInsumo();
        $categoriasInsumos = $this->inventarioInsumoService->obtenerCategoriasInsumo();

        return view('inventario.insumos.elementos', compact('elementosInsumos', 'categoriasInsumos'));
    }


    public function guardarElementoTecnologico(Request $request)

    {
        try {

            $this->inventarioTecnologicoService->crearElementoTecnologico($request->all());

            return redirect()->route('inventarioTecnologico.index');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['mensaje' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['mensaje' => 'Error interno del servidor'], 500);
        }
    }

    public function actualizarElementoTecnologico(Request $request, $id)
    {

        if (!$id) {
            return response()->json(['mensaje' => 'El ID es nulo o inválido'], 400);
        }

        try {
           
        $resultado = $this->inventarioTecnologicoService->crearElementoTecnologico($request->all());

        return redirect()->route('inventarioTecnologico.index');
    } catch (\Illuminate\Validation\ValidationException $e) {
        return response()->json(['mensaje' => $e->errors()], 422);
    } catch (\Exception $e) {
        return response()->json(['mensaje' => 'Error interno del servidor'], 500);
    }
}

    public function verElementoTecnologico($id)
    {
        return $this->inventarioTecnologicoService->generarHojaDeVidaTecnologico($id);

    }
    
    public function obtenerElementoTecnologico($id)
    {

        $elementosTecnologicos = $this->inventarioTecnologicoService->obtenerInventarioTecnologico();
        $categoriasTecnologicos = $this->inventarioTecnologicoService->obtenerCategoriasTecnologico();

        $datos = $this->inventarioTecnologicoService->obtenerDatosForaneos();

        $elemento = $this->inventarioTecnologicoService->obtenerElementoTecnologicoPorId($id);
    
        
        if (!$elemento) {
            return redirect()->route('inventarioTecnologico.index')->with('error', 'Elemento no encontrado.');
        }
    
   
        return view('inventario.tecnologicos.elementos', [
            'elemento' => $elemento,
            'elementosTecnologicos' => $elementosTecnologicos,
            'categoriasTecnologicos' => $categoriasTecnologicos,
            'empleados' => $datos['empleados'],
            'areas' => $datos['areas'],
            'sedes' => $datos['sedes'],
            'facturas' => $datos['facturas'],
            'categorias' => $datos['categorias'],
            'estados' => $datos['estados']
        
        ]);
    }
    

    public function verElementoFisico($id)
    {
        return $this->inventarioFisicoService->generarHojaDeVidaFisico($id);
    }

    public function verElementoMedico($id)
    {
        return $this->inventarioMedicoService->generarHojaDeVidaMedico($id);
    }

    public function verElementoInsumo($id)
    {
        return $this->inventarioInsumoService->generarHojaDeVidaInsumo($id);
    }

        public function getFields($table)
    {
        try {
            if (!Schema::hasTable($table)) {
                return response()->json(['error' => 'Table not found'], 404);
            }

            $columns = DB::select("SHOW COLUMNS FROM $table");

            $excludedColumns = ['id', 'created_at', 'updated_at'];
            $columnTypes = [];
            
            foreach ($columns as $column) {
                if (in_array($column->Field, $excludedColumns)) {
                    continue;
                }

                $type = $column->Type;

                // Extraer las opciones si el tipo es 'set'
                if (strpos($type, 'set') !== false) {
                    preg_match("/^set\((.*)\)$/", $type, $matches);
                    $options = explode(',', str_replace("'", '', $matches[1])); // Extraer opciones de 'set'
                    $type = 'set';
                } elseif (strpos($type, 'bigint') !== false) {
                    $type = 'unsignedBigInteger';
                } elseif (strpos($type, 'timestamp') !== false) {
                    $type = 'timestamp';
                } else {
                    $type = preg_replace('/\([0-9]+\)$/', '', $type);
                }

                // Si es tipo 'set', agrega las opciones en un campo adicional
                $columnData = [
                    'name' => $column->Field,
                    'type' => $type
                ];

                if (isset($options)) {
                    $columnData['values'] = $options;
                }

                $columnTypes[] = $columnData;
            }

            return response()->json($columnTypes); 
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

}
