<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Area;
use App\Models\ElementoFisico;
use App\Models\ReporteDanoFisico;
use App\Models\GestionTecnologico;
use App\Models\ElementoTecnologico;
use App\Models\Sede;
use App\Models\ReporteDanoTecnologico;
use App\Models\GestionFisico;


class Empleado extends Model
{
    use HasFactory;

    protected $table = 'empleados'; 

    protected $fillable = [
        'nombre1',
        'nombre2',
        'apellido1',
        'apellido2',
        'identificacion',
        'fecha_nacimiento',
        'sexo',
        'direccion',
        'celular',
        'firma',
        'email',
        'password',
        'id_sede',
        'id_area',
        'id_rol',
    ];


    // public static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($user) {
    //         $user->password = bcrypt($user->password);
    //     });
    // }

    public function area(){
        return $this->belongsTo(Area::class, 'area_id');
    }

    public function elementos_fisicos(){
        return $this->hasMany(ElementoFisico::class,'id_empleado');
    }

    public function gestiones_tecnologicos(){
        return $this->hasMany(GestionTecnologico::class,'id_empleado');
    }
    public function elementos_tecnologicos (){
        return $this->hasMany(ElementoTecnologico::class,'id_empleado');
    }
    public function sedes(){
        return $this->belongsToMany(Sede::class,'id_sede');
    }
    public function reportes_daños_fisicos_id_responsables(){
        return $this->belongsToMany(ReporteDanoFisico::class,'id_responsable');
    }
    public function reportes_daños_fisicos_id_encargados(){
        return $this->belongsToMany(ReporteDanoFisico::class,'id_encargado');
    }
    public function gestiones_fisicos(){
        return $this->hasMany(GestionFisico::class,'id_empleado');
    }
    public function resportes_daños_tecnologicos_responsables(){
        return $this->hasMany(ReporteDanoTecnologico::class,'id_responsable');
    }
    public function resportes_daños_tecnologicos_encargados(){
        return $this->hasMany(ReporteDanoTecnologico::class,'id_encargado');
    }

}
