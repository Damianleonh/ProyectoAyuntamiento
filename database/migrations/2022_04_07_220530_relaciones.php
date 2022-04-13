<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Relaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('relaciones', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('programa_id');
            $table->integer('id_usuario');
            $table->integer('id_programas');
            $table->integer('id_actividades');
            //$table->string('responsable');
            // $table->foreign('programa_id')->references('id')->on('programas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
