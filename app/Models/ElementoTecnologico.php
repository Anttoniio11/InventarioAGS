<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElementoTecnologico extends Model
{
    use HasFactory;

    protected $fillable = ['codigo','marca','referencia','serial','ubicacion','disponibilidad','codigo_QR','procesador','ram','tipo_almacenamiento','almacenamiento','tarjeta_grafica','garantia'];

    public function empleado(){
        return $this->belongsTo(Empleado::class, 'id_empleado');
    }
}
