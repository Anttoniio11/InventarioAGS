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
        Schema::create('elementos_insumos', function (Blueprint $table) {
            $table->id();

            $table->string('registro_sanitario');
            $table->string('marca');
            $table->date('fecha_vencimiento');
            $table->text('indicaciones');
            $table->text('observacion');
            $table->integer('cantidad');

            $table->unsignedBigInteger('id_categoria');
            $table->foreign('id_categoria')->references('id')->on('categorias_insumos');

            $table->unsignedBigInteger('id_factura');
            $table->foreign('id_factura')->references('id')->on('facturas');

            $table->unsignedBigInteger('id_sede');
            $table->foreign('id_sede')->references('id')->on('sedes');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('elementos_insumos');
    }
};
