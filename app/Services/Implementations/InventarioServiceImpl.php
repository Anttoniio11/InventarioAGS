<?php

namespace App\Services\Implementations;

use App\Services\InventarioService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class InventarioServiceImpl implements InventarioService {

    public function obtenerInventarioTecnologico(){

        if(Schema::hasTable('elementos_tecnologicos')){
            $inventarioTecnologicos = DB::table("elementos_tecnologicos as et")
            ->join('categorias_tecnologicos as ct', 'et.id_categoria', '=', 'et.id_categoria')
            ->select(
                'et.id',
                'et.codigo',
                'et.marca',
                'et.referencia',
                'et.serial',
                'et.ubicacion',
                'et.disponibilidad',
                'et.codigo_QR',
                'et.procesador',
                'et.ram',
                'et.tipo_almacenamiento',
                'et.almacenamiento',
                'et.tarjeta_grafica',
                'et.garantia',
                'et.id_empleado',
                'et.id_factura',
                'et.id_categoria',
                'et.id_estado',
                'et.id_categoria', 
                'ct.categoria'
            )
            ->get();
        }else{
            $inventarioTecnologicos = [];
        }
        return $inventarioTecnologicos;
    }

    public function crearElementoTecnologico(){

        if(Schema::hasTable('elementos_tecnologicos')){
            
        }

    }

    public function obtenerInventarioFisico(){

        if(Schema::hasTable('elementos_fisicos')){
            $inventarioFisicos = DB::table("elementos_fisicos as ef")
            ->join('categorias_fisicos as cf', 'ef.id_categoria', '=', 'ef.id_categoria')
            ->select(
                'ef.id',
                'ef.codigo',
                'ef.marca',
                'ef.modelo',
                'ef.ubicacion_interna',
                'ef.disponibilidad',
                'ef.codigo_QR',
                'ef.id_categoria', 
                'cf.categoria'
            )
            ->get();
        }else{
            $inventarioFisicos = [];
        }
        return $inventarioFisicos;
    }

    public function obtenerInventarioMedico(){

        if(Schema::hasTable('elementos_medicos')){
            $inventarioMedicos = DB::table("elementos_medicos as em")
            ->join('categorias_medicos as cm', 'em.id_categoria', '=', 'em.id_categoria')
            ->select(
                'em.id',
                'em.codigo',
                'em.marca',
                'em.modelo',
                'em.serie',
                'em.registro_sanitario',
                'em.ubicacion_interna',
                'em.disponibilidad',
                'em.codigo_QR',
                'em.id_categoria', 
                'cm.categoria'
            )
            ->get();
        }else{
            $inventarioMedicos = [];
        }
        return $inventarioMedicos;
    }

    public function obtenerInventarioInsumo(){

        if(Schema::hasTable('elementos_insumos')){
            $inventarioInsumos = DB::table("elementos_insumos as ei")
            ->join('categorias_insumos as ci', 'ei.id_categoria', '=', 'ei.id_categoria')
            ->select(
                'ei.id',
                'ei.registro_sanitario',
                'ei.marca',
                'ei.fecha_vencimiento',
                'ei.indicaciones',
                'ei.observacion',
                'ei.cantidad',
                'ei.id_categoria', 
                'ci.categoria'
            )
            ->get();
        }else{
            $inventarioInsumos = [];
        }
        return $inventarioInsumos;
    }

    public function obtenerCategoriasTecnologico(){

        if(Schema::hasTable('categorias_tecnologicos')){
            $categoriaTecnologicos = DB::table("categorias_tecnologicos as ct")
            ->select(
                'ct.id',
                'ct.categoria',
                
            )
            ->get();
        }else{
            $categoriaTecnologicos = [];
        }
        return $categoriaTecnologicos;
    }

    public function obtenerCategoriasFisico(){

        if(Schema::hasTable('categorias_fisicos')){
            $categoriaFisicos = DB::table("categorias_fisicos as cf")
            ->select(
                'cf.id',
                'cf.categoria',
                
            )
            ->get();
        }else{
            $categoriaFisicos = [];
        }
        return $categoriaFisicos;
    }

    public function obtenerCategoriasMedico(){

        if(Schema::hasTable('categorias_medicos')){
            $categoriaMedicos = DB::table("categorias_medicos as cm")
            ->select(
                'cm.id',
                'cm.codigo',
                'cm.categoria',
                
            )
            ->get();
        }else{
            $categoriaMedicos = [];
        }
        return $categoriaMedicos;
    }

    public function obtenerCategoriasInsumo(){

        if(Schema::hasTable('categorias_insumos')){
            $categoriaInsumos = DB::table("categorias_insumos as ci")
            ->select(
                'ci.id',
                'ci.codigo',
                'ci.categoria',
                
            )
            ->get();
        }else{
            $categoriaInsumos = [];
        }
        return $categoriaInsumos;
    }

    public function crearElementoMedico(array $data)
    {
        $contratoExistente = DB::table('contratos_convenios_salud')
            ->where('numero_contrato', $data['numero_contrato'])
            ->exists();

        if ($contratoExistente) {
            return response()->json(['mensaje' => 'El número de contrato ya existe. Por favor, elija otro número.'], 422);
        }

        $datos = [
            'modalidad_pago' => $data['modalidad_pago'],
            'numero_contrato' => $data['numero_contrato'],
            'tipo_contrato' => $data['tipo_contrato'],
            'tipo_contratacion' => $data['tipo_contratacion'],
            'fecha_inicio' => $data['fecha_inicio'],
            'fecha_fin' => $data['fecha_fin'],
            'prorrogas' => $data['prorroga'],
            'recaudo' => $data['recaudo'],
            'estado_contrato' => $data['estado_contrato'],
            'entidad_salud' => $data['entidadSalud'],
            'id_sede' => $data['id_sede'],
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $resultado = DB::table('contratos_convenios_salud')->insertGetId($datos);

        return $resultado;
    }

    public function crearElementoInsumo(array $data)
    {
        $contratoExistente = DB::table('contratos_convenios_salud')
            ->where('numero_contrato', $data['numero_contrato'])
            ->exists();

        if ($contratoExistente) {
            return response()->json(['mensaje' => 'El número de contrato ya existe. Por favor, elija otro número.'], 422);
        }

        $datos = [
            'modalidad_pago' => $data['modalidad_pago'],
            'numero_contrato' => $data['numero_contrato'],
            'tipo_contrato' => $data['tipo_contrato'],
            'tipo_contratacion' => $data['tipo_contratacion'],
            'fecha_inicio' => $data['fecha_inicio'],
            'fecha_fin' => $data['fecha_fin'],
            'prorrogas' => $data['prorroga'],
            'recaudo' => $data['recaudo'],
            'estado_contrato' => $data['estado_contrato'],
            'entidad_salud' => $data['entidadSalud'],
            'id_sede' => $data['id_sede'],
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $resultado = DB::table('contratos_convenios_salud')->insertGetId($datos);

        return $resultado;
    }
    

}
