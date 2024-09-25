<?php

namespace App\Services\Implementations;

use App\Models\Empleado;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Validation\ValidationException;
use App\Services\EmpleadoService;

class EmpleadoServiceImpl implements EmpleadoService {

    public function obtenerEmpleados()
    {
        return DB::table('empleados as e')
            ->join('sedes as s', 'e.id_sede', '=', 's.id')
            ->join('areas as a', 'e.id_area', '=', 'a.id')
            ->join('roles as r', 'e.id_rol', '=', 'r.id')
            ->select('e.*', 's.municipio as sede', 'a.area as area', 'r.rol as rol')
            ->get();
    }

    public function crearEmpleado(array $data)
    {
        $this->validarEmpleado($data);
        $datos = [
            'nombre1' => $data['nombre1'],
            'nombre2' => $data['nombre2'],
            'apellido1' => $data['apellido1'],
            'apellido2' => $data['apellido2'],
            'identificacion' => $data['identificacion'],
            'fecha_nacimiento' => $data['fecha_nacimiento'],
            'sexo' => $data['sexo'],
            'direccion' => $data['direccion'],
            'celular' => $data['celular'],
            'email' => $data['email'],
            'password' => bcrypt('default_password'),
            'id_sede' => $data['id_sede'],
            'id_area' => $data['id_area'],
            'id_rol' => $data['id_rol'],
            'created_at' => now(),
        ];

        return DB::table('empleados')->insertGetId($datos);
    }

    private function validarEmpleado(array $data)
    {
        $validator = validator()->make($data, [
            'nombre1' => 'required|string',
            'nombre2' => 'nullable|string',
            'apellido1' => 'required|string',
            'apellido2' => 'nullable|string',
            'identificacion' => 'required|string|unique:empleados',
            'fecha_nacimiento' => 'required|date',
            'sexo' => 'required|in:M,F,m,f',
            'direccion' => 'nullable|string',
            'celular' => 'required|string',
            'email' => 'required|string|unique:empleados',
            'password' => 'string|min:6', 
            'id_sede' => 'required|integer|exists:sedes,id',
            'id_area' => 'required|integer|exists:areas,id',
            'id_rol' => 'required|integer|exists:roles,id',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }

    public function obtenerDatosForaneos()
    {
        $tablas = ['sedes', 'areas', 'roles'];

        foreach ($tablas as $tabla) {
            if (!Schema::hasTable($tabla)) {
                throw new \Exception("La tabla '{$tabla}' no existe.");
            }
        }

        return [
            'sedes' => DB::table('sedes')->get(),
            'areas' => DB::table('areas')->get(),
            'roles' => DB::table('roles')->get(),
        ];
    }

    public function generarActa($id)
    {
        $empleado = Empleado::findOrFail($id);

        return PDF::loadView('pdf.actaEntrega', compact('empleado'))
            ->setPaper('letter', 'landscape')
            ->stream('ActaEntrega.pdf');
    }

    public function obtenerEmpleado($id)
    {
        return DB::table('empleados as e')
        ->join('sedes as s', 'e.id_sede', '=', 's.id')
        ->join('areas as a', 'e.id_area', '=', 'a.id')
        // ->join('roles as r', 'e.id_rol', '=', 'r.id')
        ->select(
            'e.*',
            's.municipio', 
            'a.area',
            // 'r.rol',
        )
        ->where('e.id', $id)
        ->first();
    }

    public function actualizarEmpleado($id, $data)
    {
        $updateData = [
            'nombre1' => $data['nombre1'],
            'nombre2' => $data['nombre2'],
            'apellido1' => $data['apellido1'],
            'apellido2' => $data['apellido2'],
            'identificacion' => $data['identificacion'],
            'fecha_nacimiento' => $data['fecha_nacimiento'],
            'sexo' => $data['sexo'],
            'direccion' => $data['direccion'],
            'celular' => $data['celular'],
            'email' => $data['email'],
            'password' => bcrypt('default_password'),
            'id_sede' => $data['id_sede'],
            'id_area' => $data['id_area'],
            'id_rol' => $data['id_rol'],
            'created_at' => now(),
        ];
    
        return DB::table('empleados')
            ->where('id', $id)
            ->update($updateData);
    }

}
