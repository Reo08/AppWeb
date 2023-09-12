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
        Schema::create('inscripciones', function (Blueprint $table) {
            $table->id('id_inscripciones');
            $table->boolean('estado')->nullable();
            $table->string('identificacion')->nullable();
            $table->unsignedInteger('id_cursos')->nullable();
            $table->foreign('identificacion')->references('identificacion')->on('usuarios')->onDelete('cascade');
            $table->foreign('id_cursos')->references('id_cursos')->on('cursos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscripciones');
    }
};
