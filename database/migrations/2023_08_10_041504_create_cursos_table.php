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
        Schema::create('cursos', function (Blueprint $table) {
            $table->increments('id_cursos');
            $table->string('nombre_curso');
            $table->string('slug')->nullable();
            $table->string('cantidad_modulos')->default('0')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('identificacion')->nullable();
            $table->foreign('identificacion')->references('identificacion')->on('usuarios')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cursos');
    }
};
