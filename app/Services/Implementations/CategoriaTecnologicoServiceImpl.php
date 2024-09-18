<?php

namespace App\Services\Implementations;

use App\Services\CategoriaTecnologicoService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CategoriaTecnologicoServiceImpl implements CategoriaTecnologicoService {

    public function crearCategoriaTecnologico(array $data)
    {
        try {
            // Verificar si la categoría ya existe
            $categoriaExistente = DB::table('categorias_tecnologicos')
                ->where('categoria', $data['categoria'])
                ->exists();
    
            if ($categoriaExistente) {
                return ['mensaje' => 'La categoría ya existe.'];
            }
    
            // Insertar la nueva categoría
            $resultado = DB::table('categorias_tecnologicos')->insertGetId([
                'categoria' => $data['categoria'],
                'descripcion' => $data['descripcion'],
                'created_at' => now(),
            ]);
    
            return ['resultado' => $resultado];
    
        } catch (\Exception $e) {
            // Manejar errores de base de datos
            throw new \Exception('Error al guardar la categoría', 0, $e);
        }
    }

}
