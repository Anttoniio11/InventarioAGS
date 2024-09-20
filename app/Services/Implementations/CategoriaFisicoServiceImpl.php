<?php

namespace App\Services\Implementations;

use App\Services\CategoriaFisicoService;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\ValidationException;

class CategoriaFisicoServiceImpl implements CategoriaFisicoService {

    public function obtenerCategoriasFisico(){

        if(Schema::hasTable('categorias_fisicos')){
            $categoriaFisicos = DB::table("categorias_fisicos as cf")
            ->select(
                'cf.id',
                'cf.categoria',
                'cf.descripcion',
                
            )
            ->get();
        }else{
            $categoriaFisicos = [];
        }
        return $categoriaFisicos;
    }

    public function crearCategoriaFisico(array $data)
    {   
        // dd($data['categoria']);
        // $this->validarElemento($data);

        // $categoriaExistente = DB::table('categorias_fisicos')
        //                         ->where('categoria', $data['categoria'])
        //                         ->exists();
        // // dd($categoriaExistente);
        // if ($categoriaExistente) {
        //     throw new ValidationException('El código del elemento ya existe. Por favor, elija otro código.');
        // }
        
        $rta = DB::table('categorias_fisicos')
                    ->insertGetId([
                        'categoria' => $data['categoria'],
                        'descripcion' => $data['descripcion'],
                        'created_at' => Carbon::now(),            
                        'updated_at' => Carbon::now(),            
                    ]);
        
        dd($rta);
        return $rta;
        // Insertar el nuevo elemento y obtener el ID generado
        // return DB::table('categorias_fisicos')->insertOrIgnore($datos);
    }

    private function validarElemento(array $data)
    {
        $validator = validator()->make($data, [
            'categoria' => 'required|string|unique:categorias_fisicos',
            'descripcion' => 'required|string',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }

}
