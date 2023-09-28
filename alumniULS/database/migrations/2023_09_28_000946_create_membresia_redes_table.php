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
        Schema::create('membresia_redes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_exalumno');
            $table->unsignedBigInteger('id_red_social');
            $table->timestamps();
            
            $table->foreign('id_exalumno')->references('id')->on('exalumnos');
            $table->foreign('id_red_social')->references('id')->on('redes_sociales');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('membresia_redes');
    }
};
