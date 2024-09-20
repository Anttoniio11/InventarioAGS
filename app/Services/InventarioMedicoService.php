<?php

namespace App\Services;

interface InventarioMedicoService{

    public function obtenerInventarioMedico();
    public function crearElementoMedico(array $data);
    public function generarHojaDeVidaMedico($id);
    public function obtenerDatosForaneos();

}