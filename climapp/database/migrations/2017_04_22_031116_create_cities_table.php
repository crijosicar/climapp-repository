<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCityTable extends Migration
{

    public function up()
    {
        Schema::create('city', function(Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->integer('id_state');
            $table->string('latitude');
            $table->string('longitude');
            // Constraints declaration
        });
    }

    public function down()
    {
        Schema::drop('city');
    }
}
