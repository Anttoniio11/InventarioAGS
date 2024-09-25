<?php

namespace App\Services;

interface EmpleadoService{

    public function obtenerEmpleados();
    public function crearEmpleado(array $data);
    public function obtenerDatosForaneos();
    public function generarActa($id);
    public function obtenerEmpleado($id);
    public function actualizarEmpleado($id, $data);

} 