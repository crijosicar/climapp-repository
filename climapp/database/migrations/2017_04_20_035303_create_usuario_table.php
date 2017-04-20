<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioTable extends Migration
{

    public function up()
    {
        Schema::create('Usuario', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('email');
            $table->integer('telefono', 20);
            $table->string('contrasenhia');
            $table->timestand('started_at');
            $table->timestand('published_at');
            // Constraints declaration

        });
    }

    public function down()
    {
        Schema::drop('Usuario');
    }
}
