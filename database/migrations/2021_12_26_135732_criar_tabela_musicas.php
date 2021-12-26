<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarTabelaMusicas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('musicas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->integer('numero');
            $table->boolean('escutada')->default('false');
            $table->integer('artista_id');
            $table->foreign('artista_id')->references('id')->on('artistas');
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
        Schema::dropIfExists('musicas');
    }
}
