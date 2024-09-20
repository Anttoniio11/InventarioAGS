<?php

namespace App\Services;

interface InventarioTecnologicoService{

    public function obtenerInventarioTecnologico();
    public function obtenerCategoriasTecnologico();
    public function crearElementoTecnologico(array $data);
    public function generarHojaDeVidaTecnologico($id);
    public function obtenerDatosForaneos();
    public function editarElementoTecnologico(array $data, $id);
    public function obtenerElementoTecnologicoPorId($id);

}