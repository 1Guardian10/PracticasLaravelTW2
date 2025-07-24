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
        Schema::create('libros', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('titulo');
            $table->string('autor');
            $table->string('editorial')->nullable();
            $table->integer('anio');
            $table->date('fecha_publicacion');
            $table->string('DOI')->nullable();
            $table->boolean('estado');
            $table->string('categoria');
            $table->string('imagen')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libros');
    }
};
