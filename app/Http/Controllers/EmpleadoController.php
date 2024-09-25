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

    public function verActa($id)
    {
        return $this->empleadoService->generarActa($id);
    }

    public function obtenerEmpleado($id)
    {
        $empleado = $this->empleadoService->obtenerEmpleado($id);

        if (!$empleado) {
            return response()->json(['error' => 'Empleado no encontrado'], 404);
        }
        return response()->json($empleado);
    }

    public function actualizarEmpleado(Request $request, $id)
    {
        $data = $request->all();
        $this->empleadoService->actualizarEmpleado($id, $data);
    
        // Obtener el elemento actualizado
        $empleadoActualizado = $this->empleadoService->obtenerEmpleado($id);
    
        return response()->json([
            'success' => true,
            'message' => 'Empleado actualizado correctamente.',
            'elemento' => $empleadoActualizado
        ]);
    }
    
}
