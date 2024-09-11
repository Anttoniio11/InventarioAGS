<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GestionTecnologico extends Model
{
    use HasFactory;

    protected $table = 'gestiones_tecnologicos'; 

    protected $fillable = [
        'fecha_inicio',
        'fecha_fin',
        'tipo',
        'observacion'
    ];

    
    public function empleado(){
        return $this->belongsTo(Empleado::class,'id_empleado');
    }

    public function elementos_tecnologicos(){
        return $this->hasMany(ElementoTecnologico::class,'id_elementos_fisicos');
    }
}
