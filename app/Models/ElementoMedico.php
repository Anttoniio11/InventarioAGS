<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElementoMedico extends Model
{
    use HasFactory;

    protected $table = 'elementos_medicos'; 

    protected $fillable = [
        'codigo',
        'marca', 
        'modelo',
        'serie',
        'registro_sanitario',
        'ubicacion_interna',
        'disponibilidad',
        'codigo_QR',
    ];

    public function factura(){
        return $this->belongsTo(Factura::class, 'id_factura');
    }

    public function categoriaMedico(){
        return $this->belongsTo(CategoriaMedico::class, 'id_categoria');
    }

    public function estadoElemento(){
        return $this->belongsTo(EstadoElemento::class, 'id_estado');
    }

    public function gestionesMedicos(){
        return $this->hasMany(GestionMedico::class, 'id_elemento_medico');
    }
    
    public function reporteDanoMedico(){
        return $this->hasMany(ReporteDanoMedico::class,'id_elemento_medico');
    }

}
