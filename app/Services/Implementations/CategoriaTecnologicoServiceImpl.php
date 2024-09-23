<?php

namespace App\Services\Implementations;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;
use App\Services\CategoriaTecnologicoService;

class CategoriaTecnologicoServiceImpl implements CategoriaTecnologicoService {

    public function obtenerCategoriasTecnologico()
    {

        if(Schema::hasTable('categorias_tecnologicos')){
            $categoriaTecnologicos = DB::table("categorias_tecnologicos as ct")
            ->select(
                'ct.id',
                'ct.categoria',
                'ct.descripcion',
                
            )
            ->get();
        }else{
            $categoriaTecnologicos = [];
        }
        return $categoriaTecnologicos;
    }

    public function crearCategoriaTecnologico(array $data)
    {   
        $rta = DB::table('categorias_tecnologicos')
                    ->insertGetId([
                        'categoria' => $data['categoria'],
                        'descripcion' => $data['descripcion'],
                        'created_at' => Carbon::now(),            
                        'updated_at' => Carbon::now(),            
                    ]);
        
        return $rta;
    }

}
