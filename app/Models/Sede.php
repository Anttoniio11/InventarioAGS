<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    use HasFactory;

    protected $table = 'sedes'; 

    protected $fillable = [
        'nit',
        'razon_social',
        'departamento',
        'municipio',
    ];

    
    public function elementosInsumos() {
        return $this->hasMany(ElementoInsumo::class, 'id_sede');
    }
}
