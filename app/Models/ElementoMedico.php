<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElementoMedico extends Model
{
    use HasFactory;

    protected $table = 'elementos_medicos';

    protected $fillable = ['codigo','marca', 'modelo','serie','registro_sanitario','ubicacion_interna','disponibilidad','codigo_QR','id_estado','id_categoria','id_factura'];

    public function factura(){
        return $this->belongsTo(Factura::class, 'id_factura');
    }

    public function categoria_medico(){
        return $this->belongsTo(CategoriaMedico::class, 'id_categoria');
    }

    public function estado_elemento(){
        return $this->belongsTo(EstadoElemento::class, 'id_estado');
    }


}
