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
        try {
            // Validar los datos del formulario
            $request->validate([
                'categoria' => 'required|string|max:255',
                'descripcion' => 'required|string|max:255',
            ]);
    
            // Llamar al servicio para crear la categoría
            $resultado = $this->categoriaTecnologicoService->crearCategoriaTecnologico($request->all());
    
            return response()->json($resultado);
    
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Enviar errores de validación
            return response()->json(['mensaje' => $e->errors()], 422);
        } catch (\Exception $e) {
            // Manejar errores generales
            return response()->json(['mensaje' => 'Error interno del servidor'], 500);
        }
    }

   
}
