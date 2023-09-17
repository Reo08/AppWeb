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
        Schema::create('modulos', function (Blueprint $table) {
            $table->increments('id_modulos');
            $table->string('nombre_modulo')->nullable();
            $table->string('slug');
            $table->string('url_youtube', 700)->nullable();
            $table->string('desc_modulo')->nullable();
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
        Schema::dropIfExists('modulos');
    }
};
