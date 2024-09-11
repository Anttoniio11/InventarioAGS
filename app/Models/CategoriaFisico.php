<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\ElementoFisico;


class CategoriaFisico extends Model
{
    use HasFactory;

    protected $table = 'categorias_fisicos';
    
    protected $fillable = ['categoria'];


    public function elementosFisicos(){

        return $this->hasMany(ElementoFisico::class,'id_categoria');
}
