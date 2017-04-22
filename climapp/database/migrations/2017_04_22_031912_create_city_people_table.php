<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCityPersonTable extends Migration
{

    public function up()
    {
        Schema::create('city_person', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('id_city');
            $table->integer('id_person');
            // Constraints declaration
        });
    }

    public function down()
    {
        Schema::drop('city_person');
    }
}
