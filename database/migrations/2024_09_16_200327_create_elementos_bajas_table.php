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
        Schema::create('elementos_bajas', function (Blueprint $table) {
            $table->id();
            $table->text('descripcion');
            $table->unsignedBigInteger('id_elemento_medico')->nullable();
            $table->foreign('id_elemento_medico')->references('id')->on('elementos_medicos')->nullable();
            $table->unsignedBigInteger('id_elemento_fisico')->nullable();
            $table->foreign('id_elemento_fisico')->references('id')->on('elementos_fisicos')->nullable();
            $table->unsignedBigInteger('id_elemento_tecnologico')->nullable();
            $table->foreign('id_elemento_tecnologico')->references('id')->on('elementos_tecnologicos')->nullable();
            $table->unsignedBigInteger('id_elemento_insumo')->nullable();
            $table->foreign('id_elemento_insumo')->references('id')->on('elementos_insumos')->nullable();
            
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('elementos_bajas');
    }
};
