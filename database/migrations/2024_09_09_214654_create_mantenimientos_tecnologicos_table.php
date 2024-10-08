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
        Schema::create('mantenimientos_tecnologicos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->set('tipo_mantenimiento', ['PREVENTIVO', 'CORRECTIVO']);
            $table->text('observacion');
            $table->set('estado', ['PROXIMO', 'EN PROCESO', 'FINALIZADO']);
            $table->string('responsable');
            $table->unsignedBigInteger('id_elemento_tecnologico');
            $table->foreign('id_elemento_tecnologico')->references('id')->on('elementos_tecnologicos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mantenimientos_tecnologicos');
    }
};
