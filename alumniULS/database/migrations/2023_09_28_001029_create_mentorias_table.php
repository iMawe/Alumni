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
        Schema::create('mentorias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_mentor');
            $table->unsignedBigInteger('id_estudiante');
            $table->string('tema');
            $table->text('descripcion');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->timestamps();
            
            $table->foreign('id_mentor')->references('id')->on('exalumnos');
            $table->foreign('id_estudiante')->references('id')->on('exalumnos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mentorias');
    }
};
