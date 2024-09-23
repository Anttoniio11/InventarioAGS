<?php

namespace App\Services;

interface EmpleadoService{

    public function obtenerEmpleados();
    public function crearEmpleado(array $data);
    public function obtenerDatosForaneos();

} 