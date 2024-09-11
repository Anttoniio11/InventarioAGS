<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Empleado;
use App\Models\ElementoTecnologico;


class ReporteDanoTecnologico extends Model
{
    use HasFactory;

    protected $table = 'reportes_danos_tecnologicos'; 

    protected $fillable = [
        'fecha',
        'descripcion',
        'nivel_daño'
    ];

    
    public function elemento_tecnologico()
    {
        return $this->belongsTo(ElementoTecnologico::class,'id_elementos_tecnologicos');
    }

    public function empleado_responsable(){
        return $this->belongsTo(Empleado::class,'id_responsable');
    }
    public function empleado_encargado(){
        return $this->belongsTo(Empleado::class,'id_encargado');
    }

}
