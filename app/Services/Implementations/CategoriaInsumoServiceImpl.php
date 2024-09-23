<?php

namespace App\Services\Implementations;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;
use App\Services\CategoriaInsumoService;

class CategoriaInsumoServiceImpl implements CategoriaInsumoService {

    public function obtenerCategoriasInsumo(){

        if(Schema::hasTable('categorias_insumos')){
            $categoriaInsumos = DB::table("categorias_insumos as ci")
            ->select(
                'ci.id',
                'ci.codigo',
                'ci.categoria',
                'ci.descripcion',
                
            )
            ->get();
        }else{
            $categoriaInsumos = [];
        }
        return $categoriaInsumos;
    }

    public function crearCategoriaInsumo(array $data)
    {           
        $rta = DB::table('categorias_insumos')
                    ->insertGetId([
                        'codigo' => $data['codigo'],
                        'categoria' => $data['categoria'],
                        'descripcion' => $data['descripcion'],
                        'created_at' => Carbon::now(),            
                        'updated_at' => Carbon::now(),            
                    ]);
        
        return $rta;
        
    }

}
