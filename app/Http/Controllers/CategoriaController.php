<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Services\CategoriaTecnologicoService;
use App\Services\CategoriaFisicoService;
use App\Services\CategoriaMedicoService;
use App\Services\CategoriaInsumoService;

class CategoriaController extends Controller
{

    protected $categoriaTecnologicoService, $categoriaFisicoService, $categoriaMedicoService, $categoriaInsumoService;

    public function __construct(CategoriaTecnologicoService $categoriaTecnologicoService, CategoriaFisicoService $categoriaFisicoService, CategoriaMedicoService $categoriaMedicoService, CategoriaInsumoService $categoriaInsumoService) {
        $this->categoriaTecnologicoService = $categoriaTecnologicoService;
        $this->categoriaFisicoService = $categoriaFisicoService;
        $this->categoriaMedicoService = $categoriaMedicoService;
        $this->categoriaInsumoService = $categoriaInsumoService;
    }

    public function guardarCategoriaTecnologico(Request $request)
    {   
        $resultado = $this->categoriaTecnologicoService->crearCategoriaTecnologico($request->all());

        if ($resultado == true) {
            return redirect()->route('inventarioTecnologico.index');
        } else {
            return response()->json(['mensaje' => 'Error al registrar'], 500);
        }
    
    }

    public function guardarCategoriaFisico(Request $request)
    {   
        $resultado = $this->categoriaFisicoService->crearCategoriaFisico($request->all());

        if ($resultado == true) {
            // dd('Se registro');
            return redirect()->route('inventarioFisico.index');
        } else {
            // dd('No se registro');
            return response()->json(['mensaje' => 'Error al registrar'], 500);
        }
         
        // try {

        //     return redirect()->route('inventarioFisico.index');
        // } catch (\Illuminate\Validation\ValidationException $e) {
        //     return response()->json(['mensaje' => $e->errors()], 422);
        // } catch (\Exception $e) {
        //     return response()->json(['mensaje' => 'Error interno del servidor'], 500);
        // }
    }

    public function guardarCategoriaMedico(Request $request)
    {   
        $resultado = $this->categoriaMedicoService->crearCategoriaMedico($request->all());

        if ($resultado == true) {
            return redirect()->route('inventarioMedico.index');
        } else {
            return response()->json(['mensaje' => 'Error al registrar'], 500);
        }
    
    }

    public function guardarCategoriaInsumo(Request $request)
    {   
        $resultado = $this->categoriaInsumoService->crearCategoriaInsumo($request->all());

        if ($resultado == true) {
            return redirect()->route('inventarioInsumo.index');
        } else {
            return response()->json(['mensaje' => 'Error al registrar'], 500);
        }
    
    }

}
