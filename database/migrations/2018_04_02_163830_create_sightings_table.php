<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSightingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sightings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('incident_id');
            $table->integer('station_id');
            // this will be the file name saved in local directory
            $table->string('imgurl');
            // this will be the legit linkkkkkkkkk used to access an image for the android application
            $table->string('image_url')->default('http://localhost/img/default.png');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name');
            $table->string('contact_no');
            $table->string('home_address');
            $table->string('lat');
            $table->string('lng');
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('sightings');
    }
}
