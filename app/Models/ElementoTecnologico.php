<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Empleado;
use App\Models\EstadoElemento;
use App\Models\MantenimientoTecnologico;
use App\Models\ReporteDanoTecnologico;

class ElementoTecnologico extends Model
{
    use HasFactory;

    protected $table = 'elementos_tecnologicos'; 

    protected $fillable = [
        'codigo',
        'marca',
        'referencia',
        'serial',
        'ubicacion',
        'disponibilidad',
        'codigo_QR',
        'procesador',
        'ram',
        'tipo_almacenamiento',
        'almacenamiento',
        'tarjeta_grafica',
        'garantia'
    ];


    public function empleado(){
        return $this->belongsTo(Empleado::class, 'id_empleado');
    }
    public function estado_elemento(){
        return $this->belongsTo( EstadoElemento::class,'id_estado');
    }
    public function mantenimientos(){
        return $this->hasMany( MantenimientoTecnologico::class,'id_elementos_tecnologicos');
    }
    public function catergoria_tecnologico(){
        return $this->belongsTo( CategoriaTecnologico::class,'id_categoria');
    }
    public function reportes_danos_tecnologicos(){
        return $this->hasMany( ReporteDanoTecnologico::class,'id_elementos_tecnologicos');
    }

}
