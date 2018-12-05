<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('gender');
            $table->string('profile_picture')->nullable();
            $table->string('personal_profile')->nullable();
            $table->string('charges');            
            $table->string('cv');
            $table->string('cover_letter')->nullable();
            $table->string('video')->nullable();
            $table->string('subject');
            $table->string('city');
            $table->string('tagline');
            $table->string('job_type');            
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
        Schema::dropIfExists('profiles');
    }
}
