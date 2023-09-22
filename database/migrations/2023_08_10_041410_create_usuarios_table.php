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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->string('identificacion')->primary();
            $table->string('nombre');
            $table->string('correo')->unique();
            $table->string('contrasena');
            $table->string('rol')->nullable();
            $table->boolean('admin')->nullable();
            $table->string('img_url')->default('img/avatar.jpg')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
