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
        Schema::create('proyectos', function (Blueprint $table) {
            $table->id();
            
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            // la propiedad user_id usa un tipo de dato unsignedBigInteger
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            
            // la propiedad bpm  usa un tipo de dato float
            $table->float('bpm')->nullable();
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
        Schema::dropIfExists('proyectos');
    }
};
