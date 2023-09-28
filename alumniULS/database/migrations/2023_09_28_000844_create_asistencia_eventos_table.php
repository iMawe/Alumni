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
        Schema::create('asistencia_eventos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_exalumno');
            $table->unsignedBigInteger('id_evento');
            $table->boolean('asistio');
            $table->timestamps();
            
            $table->foreign('id_exalumno')->references('id')->on('exalumnos');
            $table->foreign('id_evento')->references('id')->on('eventos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asistencia_eventos');
    }
};
