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
        return $this->belongsTo(Area::class, 'id_area');
    }

    public function rol(){
        return $this->belongsTo(Rol::class,'id_rol');
    }

    public function sede(){
        return $this->belongsTo(Sede::class,'id_sede');
    }

    public function elementosFisicos(){
        return $this->hasMany(ElementoFisico::class,'id_empleado');
    }
    public function gestionesFisicos(){
        return $this->hasMany(GestionFisico::class,'id_empleado');
    }

    public function reportesDanosFisicosResponsable(){
        return $this->hasMany(ReporteDanoFisico::class,'id_responsable');
    }
    public function reportesDanosFisicosEncargado(){
        return $this->hasMany(ReporteDanoFisico::class,'id_encargado');
    }

    public function elementosTecnologicos(){
        return $this->hasMany(ElementoTecnologico::class,'id_empleado');
    }

    public function gestionesTecnologicos(){
        return $this->hasMany(GestionTecnologico::class,'id_empleado');
    }
    
    public function reportesDanosTecnologicosResponsable(){
        return $this->hasMany(ReporteDanoTecnologico::class,'id_responsable');
    }
    public function reportesDanosTecnologicosEncargado(){
        return $this->hasMany(ReporteDanoTecnologico::class,'id_encargado');
    }

    public function gestionesMedicos(){
        return $this->hasMany(GestionMedico::class,'id_empleado');
    }
    
    public function reportesDanosMedicosResponsable(){
        return $this->hasMany(ReporteDanoMedico::class,'id_responsable');
    }
    public function reportesDanosMedicosEncargado(){
        return $this->hasMany(ReporteDanoMedico::class,'id_encargado');
    }
  

   

}
