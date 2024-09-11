<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Area;
use App\Models\Empleado;
use App\Models\CategoriaFisico;
use App\Models\ReporteDanoFisico;

class ElementoFisico extends Model
{
    use HasFactory;

    protected $table = 'elementos_fisicos';
    
    protected $fillable = [
        'codigo',
        'marca', 
        'modelo',
        'ubicacion_interna',
        'disponibilidad',
        'observacion',
        'codigo_QR'
    ];


    public function area(){
        return $this->belongsTo(Area::class, 'id_area');
    }
    public function empleado(){
        return $this->belongsTo(Empleado::class, 'id_empleado');
    }

    public function estadoElemento(){
        return $this->belongsTo(EstadoElemento::class,'id_estado');
    }

    public function categoria(){
        return $this->belongsTo(CategoriaFisico::class, 'id_categoria');
    }

    public function factura(){
        return $this->belongsTo(Factura::class,'id_factura');
    }
    
    public function gestionesFisicos(){
        return $this->hasMany(GestionFisico::class, 'id_elemento_fisico');
    }
    
    public function reporteDanoFisico(){
        return $this->hasMany(ReporteDanoFisico::class,'id_elemento_fisico');
    }


}
