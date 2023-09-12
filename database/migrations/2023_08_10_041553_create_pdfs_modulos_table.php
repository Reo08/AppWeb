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
        Schema::create('pdfs_modulos', function (Blueprint $table) {
            $table->id('id_pdf');
            $table->string('nombre_pdf')->nullable();
            $table->string('url_pdf')->nullable();
            $table->unsignedInteger('id_modulos')->nullable();
            $table->foreign('id_modulos')->references('id_modulos')->on('modulos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pdfs_modulos');
    }
};
