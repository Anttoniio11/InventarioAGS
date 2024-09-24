<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PanelService;

class PanelController extends Controller
{
    protected $panelService;

    public function __construct(PanelService $panelService)
    {
        $this->panelService = $panelService;
    }

    public function panel()
    {
        // $cantidadElementosFisicos = $this->panelService->obtenerCantidadElementosFisicos();

        return view('panel.index');
    }
}
