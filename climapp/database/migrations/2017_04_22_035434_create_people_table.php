<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleTable extends Migration
{

    public function up()
    {
        Schema::create('people', function(Blueprint $table) {
            $table->increments('id');
            $table->date('birth_date');
            $table->string('email');
            $table->numeric('id_born_city');
            $table->numeric('id_gender');
            $table->numeric('id_state');
            $table->string('last_name');
            $table->string('name');
            $table->string('phone');
            // Constraints declaration
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('people');
    }
}
