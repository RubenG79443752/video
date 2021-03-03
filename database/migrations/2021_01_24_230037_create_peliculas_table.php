<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeliculasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peliculas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo')->nullable(false);
            $table->string('clasificacion', 1)->default('A');
            $table->string('genero', 15)->nullable(false);
            $table->integer('duracion')->default(60);
            $table->integer('estreno');
            $table->unsignedBigInteger('idioma_id');
            $table->foreign('idioma_id')->references('id')->on('idiomas');
            $table->timestamps();
        });
        Schema::create('pelicula_persona', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('persona_id');
            $table->unsignedBigInteger('pelicula_id');
            $table->foreign('persona_id')->references('id')->on('personas');
            $table->foreign('pelicula_id')->references('id')->on('peliculas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pelicula_persona');
        Schema::dropIfExists('peliculas');
    }
}
