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
        Schema::create('elementos_medicos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();
            $table->string('marca');
            $table->string('modelo');
            $table->string('serie')->nullable();
            $table->string('registro_sanitario');
            $table->string('ubicacion_interna');
            $table->set('disponibilidad', ['SI', 'NO']);
            $table->longText('codigo_QR');
            $table->unsignedBigInteger('id_estado');
            $table->foreign('id_estado')->references('id')->on('estado_elementos');
            $table->unsignedBigInteger('id_categoria');
            $table->foreign('id_categoria')->references('id')->on('categorias_medicos');
            $table->unsignedBigInteger('id_factura');
            $table->foreign('id_factura')->references('id')->on('facturas');
            $table->unsignedBigInteger('id_empleado')->nullable();
            $table->foreign('id_empleado')->references('id')->on('empleados')->nullable();
            $table->unsignedBigInteger('id_area')->nullable();
            $table->foreign('id_area')->references('id')->on('areas')->nullable();
            $table->unsignedBigInteger('id_sede')->nullable();
            $table->foreign('id_sede')->references('id')->on('sedes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('elementos_medicos');
    }
};
