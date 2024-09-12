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
        Schema::create('gestiones_fisicos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->string('tipo');
            $table->text('observacion');
            $table->unsignedBigInteger('id_empleado');
            $table->foreign('id_empleado')->references('id')->on('empleados');
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
        Schema::dropIfExists('gestiones_fisicos');
    }
};
