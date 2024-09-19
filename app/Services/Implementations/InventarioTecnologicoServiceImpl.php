<?php

namespace App\Services\Implementations;

use App\Services\InventarioTecnologicoService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\ElementoTecnologico;

class InventarioTecnologicoServiceImpl implements InventarioTecnologicoService {

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

    public function obtenerCategoriasTecnologico(){

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

    public function crearElementoTecnologico(array $data)
    {
        $elementoExistente = DB::table('elementos_tecnologicos')
            ->where('codigo', $data['codigo'])
            ->exists();

        if ($elementoExistente) {
            return response()->json(['mensaje' => 'El código del elemento ya existe. Por favor, elija otro código.'], 422);
        }

        $datos = [
            'codigo' => $data['codigo'],
            'marca' => $data['marca'],
            'referencia' => $data['referencia'],
            'serial' => $data['serial'],
            'ubicacion' => $data['ubicacion'],
            'disponibilidad' => $data['disponibilidad'],
            'codigo_QR' => $data['codigo_QR'],
            'procesador' => $data['procesador'],
            'ram' => $data['ram'],
            'tipo_almacenamiento' => $data['tipo_almacenamiento'],
            'almacenamiento' => $data['almacenamiento'],
            'tarjeta_grafica' => $data['tarjeta_grafica'],
            'garantia' => $data['garantia'],
            'id_empleado' => $data['id_empleado'],
            'id_area' => $data['id_area'],
            'id_sede' => $data['id_sede'],
            'id_factura' => $data['id_factura'],
            'id_categoria' => $data['id_categoria'],
            'id_estado' => $data['id_estado'],
            'created_at' => now(),
        ];
        $resultado = DB::table('elementos_tecnologicos')->insertGetId($datos);
        return $resultado;
    } 

    public function generarHojaDeVidaTecnologico($id)
    {
        $elemento = ElementoTecnologico::findOrFail($id);

        return PDF::loadView('pdf.hojaDeVidaTecnologicos', compact('elemento'))
            ->setPaper('letter', 'landscape')
            ->stream('HojaDeVidaFisico.pdf');
    }


}