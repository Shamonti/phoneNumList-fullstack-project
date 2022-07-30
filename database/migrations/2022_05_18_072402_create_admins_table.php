<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        DB::table('admins')->insert(
            array(
                'name'=> 'Diba',
                'email' => 'shorodindudiba@gmail.com',
                'password' => Hash::make('123456'),
            ),
        );
        DB::table('admins')->insert(
            array(
                'name'=> 'Shamonti',
                'email' => 'shamontihaque@seoexpartebd.com',
                'password' => Hash::make('123456'),
            ),
        );

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
