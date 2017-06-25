<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonFrecuentCitiesTable extends Migration
{

    public function up()
    {
        Schema::create('person_frecuent_cities', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('id')->unsigned();
            $table->string('code');
            $table->integer('id_city')->unsigned();
            $table->integer('id_person')->unsigned();
            // Constraints declaration

        });
    }

    public function down()
    {
        Schema::drop('person_frecuent_cities');
    }
}
