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
        Schema::create('audios', function (Blueprint $table) {
            $table->id();
            
            $table->string('nombre', 100);
            $table->string('descripcion')->nullable();
            $table->string('url');
            // la propiedad tipo usa un tipo de dato string de longitud 100
            $table->string('tipo', 100)->nullable();
            // la propiedad bpm  usa un tipo de dato float
            $table->float('bpm')->nullable();
            
            $table->unsignedBigInteger('proyecto_id')->nullable();
            $table->foreign('proyecto_id')->references('id')->on('proyectos')->onDelete('set null');
            
            // la propiedad user_id usa un tipo de dato unsignedBigInteger
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            // la propiedad public usa un tipo de dato boolean
            $table->boolean('public')->default(false);
            
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audios');
    }
};
