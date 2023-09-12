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
        Schema::create('curso_completado', function (Blueprint $table) {
            $table->id('id_curso_completado');
            $table->boolean('curso_finalizado')->default(0)->nullable();
            $table->unsignedInteger('id_cursos')->nullable();
            $table->foreign('id_cursos')->references('id_cursos')->on('cursos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('curso_completado');
    }
};
