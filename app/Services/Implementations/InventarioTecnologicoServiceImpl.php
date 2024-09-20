<?php

namespace App\Services\Implementations;

use App\Services\InventarioTecnologicoService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\ElementoTecnologico;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class InventarioTecnologicoServiceImpl implements InventarioTecnologicoService
{

 public function obtenerInventarioTecnologico()
{
    if (Schema::hasTable('elementos_tecnologicos')) {
        $inventarioTecnologicos = DB::table("elementos_tecnologicos as et")
            ->join('categorias_tecnologicos as ct', 'et.id_categoria', '=', 'ct.id') // Corrige aquí
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
                'ct.categoria' // Esta es la categoría de la tabla unida
            )
            ->get();
    } else {
        $inventarioTecnologicos = [];
    }
    return $inventarioTecnologicos;
}

    public function obtenerCategoriasTecnologico()
    {

        if (Schema::hasTable('categorias_tecnologicos')) {
            $categoriaTecnologicos = DB::table("categorias_tecnologicos as ct")
                ->select(
                    'ct.id',
                    'ct.categoria',
                    'ct.descripcion',

                )
                ->get();
        } else {
            $categoriaTecnologicos = [];
        }
        return $categoriaTecnologicos;
    }

    public function crearElementoTecnologico(array $data)
    {

        $this->validarElemento($data);

        $elementoExistente = DB::table('elementos_tecnologicos')
            ->where('codigo', $data['codigo'])
            ->exists();

        if ($elementoExistente) {
            throw new ValidationException('El código del elemento ya existe. Por favor, elija otro código.');
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

        // Insertar el elemento
        return DB::table('elementos_tecnologicos')->insertGetId($datos);
    }

    public function generarHojaDeVidaTecnologico($id)
    {
        $elemento = ElementoTecnologico::findOrFail($id);

        return PDF::loadView('pdf.hojaDeVidaTecnologicos', compact('elemento'))
            ->setPaper('letter', 'landscape')
            ->stream('HojaDeVidaFisico.pdf');
    }

    private function validarElemento(array $data)
    {
        $validator = validator()->make($data, [
            'codigo' => 'required|string|unique:elementos_tecnologicos',
            'marca' => 'required|string',
            'referencia' => 'required|string',
            'serial' => 'nullable|string',
            'ubicacion' => 'required|string',
            'disponibilidad' => 'required|in:SI,NO',
            'codigo_QR' => 'required|string',
            'procesador' => 'nullable|string',
            'ram' => 'nullable|string',
            'tipo_almacenamiento' => 'nullable|string',
            'almacenamiento' => 'nullable|string',
            'tarjeta_grafica' => 'nullable|string',
            'garantia' => 'nullable|string',
            'id_empleado' => 'nullable|integer|exists:empleados,id',
            'id_area' => 'nullable|integer|exists:areas,id',
            'id_sede' => 'nullable|integer|exists:sedes,id',
            'id_factura' => 'required|integer|exists:facturas,id',
            'id_categoria' => 'required|integer|exists:categorias_tecnologicos,id',
            'id_estado' => 'required|integer|exists:estado_elementos,id',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }


    public function verElementoTecnologico($id)
    {
        // Carga el elemento junto con la relación de categoría
        return ElementoTecnologico::with('categoria')->find($id);
    }



    public function obtenerDatosForaneos()
    {
        $tablas = [
            'empleados',
            'areas',
            'sedes',
            'facturas',
            'categorias_tecnologicos',
            'estado_elementos',
        ];

        foreach ($tablas as $tabla) {
            if (!Schema::hasTable($tabla)) {
                throw new \Exception("La tabla '{$tabla}' no existe.");
            }
        }

        return [
            'empleados' => DB::table('empleados')->get(),
            'areas' => DB::table('areas')->get(),
            'sedes' => DB::table('sedes')->get(),
            'facturas' => DB::table('facturas')->get(),
            'categorias' => DB::table('categorias_tecnologicos')->get(),
            'estados' => DB::table('estado_elementos')->get(),
        ];
    }

    public function obtenerElementoTecnologicoPorId($id)
    {
        // Validar que el ID sea un número entero y mayor a cero
        if (!is_numeric($id) || $id <= 0) {
            throw new \InvalidArgumentException('ID inválido proporcionado.');
        }

        // Obtener el elemento y sus foráneas
        $elemento = DB::table('elementos_tecnologicos')->where('id', $id)->first();

        if (!$elemento) {
            throw new ModelNotFoundException('Elemento tecnológico no encontrado.');
        }

        // Obtener datos foráneos
        $empleados = DB::table('empleados')->get();
        $areas = DB::table('areas')->get();
        $sedes = DB::table('sedes')->get();
        $facturas = DB::table('facturas')->get();
        $categorias = DB::table('categorias_tecnologicos')->get();
        $estados = DB::table('estado_elementos')->get();

        return [
            'elemento' => $elemento,
            'empleados' => $empleados,
            'areas' => $areas,
            'sedes' => $sedes,
            'facturas' => $facturas,
            'categorias' => $categorias,
            'estados' => $estados,
        ];
    }

    public function editarElementoTecnologico(array $data, $id)
    {
        // Verificar que el ID es un número positivo
        if (!is_numeric($id) || $id <= 0) {
            throw new \Exception('ID inválido.');
        }
    
        // Validar los datos antes de editar
        $this->validarElementoParaEditar($data, $id);
    
        // Intentar buscar el elemento en la base de datos
        $elemento = DB::table('elementos_tecnologicos')->where('id', $id)->first();
    
        // Verificar si el elemento fue encontrado
        if (!$elemento) {
            throw new \Exception("El elemento con ID $id no fue encontrado.");
        }
    
        // Preparar los datos para actualizar
        $datosActualizados = [
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
            'updated_at' => now(),
        ];
    
        // Actualizar el elemento en la base de datos
        DB::table('elementos_tecnologicos')
            ->where('id', $id)
            ->update($datosActualizados);
    
        return $id;
    }
    
    private function validarElementoParaEditar(array $data, $id)
    {
        $validator = validator()->make($data, [
            'codigo' => 'required|string|unique:elementos_tecnologicos,codigo,' . $id,
            'marca' => 'required|string',
            'referencia' => 'required|string',
            'serial' => 'nullable|string',
            'ubicacion' => 'required|string',
            'disponibilidad' => 'required|in:SI,NO',
            'codigo_QR' => 'required|string',
            'procesador' => 'nullable|string',
            'ram' => 'nullable|string',
            'tipo_almacenamiento' => 'nullable|string',
            'almacenamiento' => 'nullable|string',
            'tarjeta_grafica' => 'nullable|string',
            'garantia' => 'nullable|string',
            'id_empleado' => 'nullable|integer|exists:empleados,id',
            'id_area' => 'nullable|integer|exists:areas,id',
            'id_sede' => 'nullable|integer|exists:sedes,id',
            'id_factura' => 'required|integer|exists:facturas,id',
            'id_categoria' => 'required|integer|exists:categorias_tecnologicos,id',
            'id_estado' => 'required|integer|exists:estado_elementos,id',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }
}
