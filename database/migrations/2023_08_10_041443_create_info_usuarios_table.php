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
        Schema::create('info_usuarios', function (Blueprint $table) {
            $table->increments('id_info_usuarios');
            $table->string('ciudad')->nullable();
            $table->string('direccion')->nullable();
            $table->string('imagen_url')->default('/app-web/public/img/avatar.jpg')->nullable();
            $table->string('telefono')->nullable();
            $table->string('celular')->nullable();
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
        Schema::dropIfExists('info_usuarios');
    }
};
