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
        Schema::create('preguntas_test', function (Blueprint $table) {
            $table->increments('id_pregunta');
            $table->string('pregunta')->nullable();
            $table->string('respuesta_uno')->nullable();
            $table->string('respuesta_dos')->nullable();
            $table->string('respuesta_tres')->nullable();
            $table->string('correcta')->nullable();
            $table->unsignedInteger('id_test')->nullable();
            $table->foreign('id_test')->references('id_test')->on('test')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preguntas_test');
    }
};
