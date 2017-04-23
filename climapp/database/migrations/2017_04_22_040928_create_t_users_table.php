<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTUsersTable extends Migration
{

    public function up()
    {
        Schema::create('t_user', function(Blueprint $table) {
            $table->increments('id');
            $table->numeric('id_person');
            $table->string('password');
            $table->string('user_name');
            // Constraints declaration
        });
    }

    public function down()
    {
        Schema::drop('t_user');
    }
}
