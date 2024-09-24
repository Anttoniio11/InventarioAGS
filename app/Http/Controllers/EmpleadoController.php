<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use App\Services\EmpleadoService;

class EmpleadoController extends Controller
{
   
    protected $empleadoService;

    public function __construct(EmpleadoService $empleadoService) {
        $this->empleadoService = $empleadoService;
    }

    public function empleados()
    {
        $empleados = $this->empleadoService->obtenerEmpleados();
        $sedes = $this->empleadoService->obtenerDatosForaneos()['sedes'];
        $areas = $this->empleadoService->obtenerDatosForaneos()['areas'];
        $roles = $this->empleadoService->obtenerDatosForaneos()['roles'];

        return view('empleados.empleados', compact('empleados', 'sedes', 'areas', 'roles'));
    }

    public function guardarEmpleado(Request $request)
    {
        $this->empleadoService->crearEmpleado($request->all());
        return redirect()->route('empleados.index')->with('success', 'Empleado creado exitosamente.');
    }
    
}
