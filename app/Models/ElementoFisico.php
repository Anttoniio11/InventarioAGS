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
    protected $fillable = ['codigo','marca', 'modelo','ubicacion_interna','disponibilidad','observacion','codigo_QR'];

    public function area(){
        return $this->belongsTo(Area::class, 'id_area');
    }
    public function empleado(){
        return $this->belongsTo(Empleado::class, 'id_empleado');
    }
    public function gestiones_fisicos(){
        return $this->hasMany(GestionFisico::class, 'id_elementos_fisicos');
    }
    public function categoria_fisico(){
        return $this->belongsTo(CategoriaFisico::class, 'id_categoria');
    }

    public function reporte_dano_fisico(){
        return $this->hasMany(ReporteDanoFisico::class,'id_elementos_fisicos');
    }


}
