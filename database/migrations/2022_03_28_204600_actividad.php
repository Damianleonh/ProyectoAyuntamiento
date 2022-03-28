<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Actividad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('actividad', function(Blueprint $table){
            $table->id();
            $table->foreignIdFor('programa_id');
            $table->text('actividad');
            //$table->string('responsable');
            $table->foreign('programa_id')->references('id')->on('programas')->onDelete('cascade');
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
