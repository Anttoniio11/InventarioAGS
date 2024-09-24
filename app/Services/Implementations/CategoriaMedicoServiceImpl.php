<?php

namespace App\Services\Implementations;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;
use App\Services\CategoriaMedicoService;

class CategoriaMedicoServiceImpl implements CategoriaMedicoService {

    public function obtenerCategoriasMedico()
    {
        if(Schema::hasTable('categorias_medicos')){
            $categoriaMedicos = DB::table("categorias_medicos as cm")
            ->select(
                'cm.id',
                'cm.codigo',
                'cm.categoria',
                'cm.descripcion',
                
            )
            ->get();
        }else{
            $categoriaMedicos = [];
        }
        return $categoriaMedicos;
    }

    public function crearCategoriaMedico(array $data)
    {           
        $rta = DB::table('categorias_medicos')
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
