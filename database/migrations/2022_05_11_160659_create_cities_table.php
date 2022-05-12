<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
             $table->increments('id');
             //Faz o relacionamento das tabelas Pais x Estados
             $table->integer('state_id')->unsigned();
             //'state_id' faz referencia ao id dos estados e ao deletar um estado deleta as cidades
             $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
             $table->string('name', 100);
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
        Schema::dropIfExists('cities');
    }
}
