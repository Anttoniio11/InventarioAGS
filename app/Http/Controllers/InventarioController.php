<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Models\ElementoTecnologico;
use App\Services\InventarioTecnologicoService;
use App\Services\InventarioFisicoService;
use App\Services\InventarioMedicoService;
use App\Services\InventarioInsumoService;
use Illuminate\Support\Facades\Log;

class InventarioController extends Controller
{

    protected $inventarioTecnologicoService, $inventarioFisicoService, $inventarioMedicoService, $inventarioInsumoService;

    public function __construct(InventarioTecnologicoService $inventarioTecnologicoService, InventarioFisicoService $inventarioFisicoService, InventarioMedicoService $inventarioMedicoService, InventarioInsumoService $inventarioInsumoService) {
        $this->inventarioTecnologicoService = $inventarioTecnologicoService;
        $this->inventarioFisicoService = $inventarioFisicoService;
        $this->inventarioMedicoService = $inventarioMedicoService;
        $this->inventarioInsumoService = $inventarioInsumoService;
    }

    public function inventarioTecnologico()
{
    // Obtener los elementos tecnológicos y categorías
    $elementosTecnologicos = $this->inventarioTecnologicoService->obtenerInventarioTecnologico();
    $categoriasTecnologicos = $this->inventarioTecnologicoService->obtenerCategoriasTecnologico();

    // Obtener datos foráneos
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


    public function guardarElementoFisico(Request $request)
    {
        try {
            $elementos = $request->validate([
                'codigo' => 'required|string',
                'marca' => 'required|string',
                'modelo' => 'required|string',
                'ubicacion_interna' => 'required|string',
                'disponibilidad' => 'required|string',
                'codigo_QR' => 'required|string',
                'id_empleado' => 'required|integer',
                'id_area' => 'required|integer',
                'id_sede' => 'required|integer',
                'id_factura' => 'required|integer',
                'id_categoria' => 'required|integer',
                'id_estado' => 'required|integer',
            ]);

            $resultado = $this->inventarioFisicoService->crearElementoFisico($elementos);

            return response()->json($resultado);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['mensaje' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['mensaje' => 'Error interno del servidor'], 500);
        }
    }


    public function guardarElementoTecnologico(Request $request)
{
    try {
        // Validar y guardar el elemento utilizando el servicio
        $resultado = $this->inventarioTecnologicoService->crearElementoTecnologico($request->all());

        // Guardar un mensaje de éxito en la sesión
        session()->flash('mensaje', 'Elemento tecnológico guardado con éxito.');

        // Redirigir a la ruta donde se carga la vista
        return redirect()->route('inventarioTecnologico.index');
    } catch (\Illuminate\Validation\ValidationException $e) {
        return response()->json(['mensaje' => $e->errors()], 422);
    } catch (\Exception $e) {
        return response()->json(['mensaje' => 'Error interno del servidor'], 500);
    }
}



     public function verElemento($id)
    {
        $elemento = $this->inventarioTecnologicoService->verElementoTecnologico($id);

        if (!$elemento) {
            return response()->json(['error' => 'Elemento no encontrado'], 404);
        }

        return response()->json($elemento);
    }


        // public function getFields($table)
        // {
        //     try {

        //         if (!Schema::hasTable($table)) {
        //             return response()->json(['error' => 'Table not found'], 404);
        //         }

        //         $columns = DB::getSchemaBuilder()->getColumnListing($table);


        //         $filteredColumns = array_filter($columns, function($column) {
        //             return !in_array($column, ['id', 'created_at', 'updated_at']);
        //         });

        //         return response()->json(array_values($filteredColumns));
        //     } catch (\Exception $e) {
        //         return response()->json(['error' => 'An error occurred'], 500);
        //     }
        // }

     
        
}
