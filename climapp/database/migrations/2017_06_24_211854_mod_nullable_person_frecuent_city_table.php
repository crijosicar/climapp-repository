<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModNullablePersonFrecuentCityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('person_frecuent_city', function (Blueprint $table) {
            $table->dateTime('created_at')->nullable()->change(); 
            $table->dateTime('updated_at')->nullable()->change(); 
            $table->dateTime('deleted_at')->nullable()->change(); 
        });
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