<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('elementos_tecnologicos', function (Blueprint $table) {
            $table->id();
            
            $table->string('codigo')->unique();
            $table->string('marca');
            $table->string('referencia');
            $table->string('serial');
            $table->string('ubicacion');
            $table->set('disponibilidad',['SI','NO']);
            $table->longText('codigo_QR');
            $table->string('procesador');
            $table->string('ram');
            $table->string('tipo_almacenamiento');
            $table->string('almacenamiento');
            $table->string('tarjeta_grafica');
            $table->string('garantia');

            $table->unsignedBigInteger('id_empleado');
            $table->foreign('id_empleado')->references('id')->on('empleados');

            $table->unsignedBigInteger('id_factura');
            $table->foreign('id_factura')->references('id')->on('facturas');

            $table->unsignedBigInteger('id_categoria');
            $table->foreign('id_categoria')->references('id')->on('categorias_tecnologicos');

            $table->unsignedBigInteger('id_estado');
            $table->foreign('id_estado')->references('id')->on('estado_elementos');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('elementos_tecnologicos');
    }
};
