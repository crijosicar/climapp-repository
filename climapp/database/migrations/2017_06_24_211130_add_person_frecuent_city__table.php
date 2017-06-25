<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPersonFrecuentCityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('person_frecuent_city')) {
            Schema::create('person_frecuent_city', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->bigInteger('id_city');
                $table->bigInteger('id_person');
                $table->dateTime('created_at');
                $table->dateTime('updated_at');
                $table->dateTime('deleted_at');
            });
        }
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
