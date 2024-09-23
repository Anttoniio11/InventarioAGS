<?php

namespace App\Services;

interface CategoriaInsumoService{

    public function obtenerCategoriasInsumo();
    public function crearCategoriaInsumo(array $data); 
    
}