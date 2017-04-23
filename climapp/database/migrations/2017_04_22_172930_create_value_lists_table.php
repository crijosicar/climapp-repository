<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValueListsTable extends Migration
{

    public function up()
    {
        Schema::create('value_list', function(Blueprint $table) {
            $table->increments('id');
            $table->string('category');
            $table->string('description');
            $table->string('value');
            // Constraints declaration

        });
    }

    public function down()
    {
        Schema::drop('value_list');
    }
}
