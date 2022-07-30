<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhoneListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phone_lists', function (Blueprint $table) {
            $table->id();
            $table->string('phone')/*->unique()*/;
            $table->bigInteger('uid')->nullable();
            $table->string('email')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('full_name');
            $table->string('age')->nullable();
            $table->string('gender')->nullable();
            $table->string('country')->nullable();
            $table->string('location')->nullable();
            $table->string('location_city')->nullable();
            $table->string('location_state')->nullable();
            $table->string('location_region')->nullable();
            $table->string('hometown')->nullable();
            $table->string('hometown_city')->nullable();
            $table->string('hometown_state')->nullable();
            $table->string('hometown_region')->nullable();
            $table->string('relationship_status')->nullable();
            $table->bigInteger('education_last_year')->nullable();
            $table->string('work')->nullable();
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
        Schema::dropIfExists('phone_lists');
    }
}
