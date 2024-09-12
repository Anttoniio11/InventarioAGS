<?php

namespace App\Http\Controllers;

use App\Services\InventarioService;
use Illuminate\Http\Request;

class InventarioController extends Controller
{

    protected $inventarioService;

    public function __construct(InventarioService $inventarioService) {
        $this->inventarioService = $inventarioService;
    }

    public function inventarioTecnologico(){

        $elementosTecnologicos = $this->inventarioService->obtenerInventarioTecnologico();

        return view('inventario.tecnologicos.elementos',compact('elementosTecnologicos'));

        }
}
