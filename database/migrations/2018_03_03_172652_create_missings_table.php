<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMissingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('missings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('avatar')->default('default.png');
            $table->string('imgurl');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('birthdate');
            $table->string('gender');
            $table->string('nationality');
            $table->string('lat');
            $table->string('lng');
            $table->string('date_last_seen');
            $table->string('skin_type');
            $table->string('height');
            $table->string('weight');
            $table->string('medical_history');
            $table->string('body_marks');
            $table->string('top');
            $table->string('bottom');
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('missings');
    }
}
