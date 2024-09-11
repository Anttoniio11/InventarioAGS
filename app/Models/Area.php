<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Empleado;
use App\Models\ElementoFisico;



class Area extends Model
{
    use HasFactory;

    protected $table = 'areas';
    
    protected $fillable = ['area'];


    public function empleados(){
        return $this->hasMany(Empleado::class,'area_id');
    }
    public function elementos_fisicos(){
        return $this->hasMany(ElementoFisico::class,'id_area');
    }
}
