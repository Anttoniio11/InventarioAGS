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
            $table->string('serial')->nullable();
            $table->string('ubicacion');
            $table->set('disponibilidad',['SI','NO']);
            $table->text('codigo_QR');
            $table->string('procesador')->nullable();
            $table->string('ram')->nullable();
            $table->string('tipo_almacenamiento')->nullable();
            $table->string('almacenamiento')->nullable();
            $table->string('tarjeta_grafica')->nullable();
            $table->string('garantia')->nullable();
            $table->unsignedBigInteger('id_empleado')->nullable();
            $table->foreign('id_empleado')->references('id')->on('empleados')->nullable();
            $table->unsignedBigInteger('id_area')->nullable();
            $table->foreign('id_area')->references('id')->on('areas')->nullable();
            $table->unsignedBigInteger('id_sede')->nullable();
            $table->foreign('id_sede')->references('id')->on('sedes')->nullable();
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
