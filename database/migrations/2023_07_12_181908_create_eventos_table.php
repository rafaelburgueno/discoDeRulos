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
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            
            // la propiedad audio_id hace referencia a un elemento de la tabla audio
            $table->unsignedBigInteger('audio_id')->nullable();
            $table->foreign('audio_id')->references('id')->on('audios')->onDelete('cascade');
            
            // la propiedad descripcion
            $table->string('descripcion')->nullable();
            
            // la propiedad marca
            $table->double('marca')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};
