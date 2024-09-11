<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaMedico extends Model
{
    use HasFactory;

    protected $table = 'categorias_medicos';

    protected $fillable = ['codigo', 'categoria'];


    public function elementosMedicos()
    {
        return $this->hasMany(ElementoMedico::class, 'id_categoria');
    }
}
