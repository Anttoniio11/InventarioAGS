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
        Schema::create('reportes_danos_fisicos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->text('descripcion');
            $table->set('nivel_daño', ['LEVE', 'MODERADO', 'GRAVE']);
            $table->unsignedBigInteger('id_responsable');
            $table->foreign('id_responsable')->references('id')->on('empleados');
            $table->unsignedBigInteger('id_encargado');
            $table->foreign('id_encargado')->references('id')->on('empleados');
            $table->unsignedBigInteger('id_elemento_fisico');
            $table->foreign('id_elemento_fisico')->references('id')->on('elementos_fisicos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reportes_danos_fisicos');
    }
};
