<?php

namespace App\Services;

interface InventarioService{

    public function obtenerInventarioTecnologico();
    public function obtenerInventarioFisico();
    public function obtenerInventarioMedico();
    public function obtenerInventarioInsumo();
    public function obtenerCategoriasTecnologico();
    public function obtenerCategoriasFisico();
    public function obtenerCategoriasMedico();
    public function obtenerCategoriasInsumo();
    
}