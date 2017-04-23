<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAccessesTable extends Migration
{

    public function up()
    {
        Schema::create('user_access', function(Blueprint $table) {
            $table->increments('id');
            $table->numeric('id_user');
            $table->string('state_login');
            $table->string('state_token');
            $table->string('token');
            $table->date('login_date');
            $table->date('logout_date');
            // Constraints declaration
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('user_access');
    }
}
