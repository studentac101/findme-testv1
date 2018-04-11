<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePetitionersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */


    public function up()
    {
        Schema::create('petitioners', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('station_id');
            $table->string('username');
            $table->string('password')->default(md5('default'));
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('gender');
            $table->string('birthdate');
            $table->string('nationality');
            $table->string('address');
            $table->string('contact_no');
            $table->string('email');
            $table->integer('flag')->default(1);
            $table->string('token')->nullable();
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
        Schema::dropIfExists('petitioners');
    }
}
