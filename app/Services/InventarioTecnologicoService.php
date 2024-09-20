<?php

namespace App\Services;

interface InventarioTecnologicoService{

    public function obtenerInventarioTecnologico();
    public function crearElementoTecnologico(array $data);
    public function generarHojaDeVidaTecnologico($id);
    public function obtenerDatosForaneos();

}