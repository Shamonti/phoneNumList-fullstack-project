<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSetPurchasePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('set_purchase_plans', function (Blueprint $table) {
            $table->id();
            $table->string('plan');
            $table->integer('credit');
            $table->integer('phoneNumber');
            $table->string('dataFilter');
            $table->string('csvExport');
            $table->integer('price');
            $table->timestamps();
        });
        DB::table('set_purchase_plans')->insert(
            array(
                'plan'=> 'Free',
                'credit' => 20,
                'phoneNumber' => 20,
                'dataFilter' => 'Basic Filters',
                'csvExport' => 'CSV Export',
                'price' => 0,
            ),
        );
        DB::table('set_purchase_plans')->insert(
            array(
                'plan'=> 'Basic',
                'credit' => 5000,
                'phoneNumber' => 5000,
                'dataFilter' => 'Data Filters',
                'csvExport' => 'CSV Export',
                'price' => 100,
            ),
        );
        DB::table('set_purchase_plans')->insert(
            array(
                'plan'=> 'Professional',
                'credit' => 10000,
                'phoneNumber' => 10000,
                'dataFilter' => 'Data Filters',
                'csvExport' => 'CSV Export',
                'price' => 190,
            ),
        );
        DB::table('set_purchase_plans')->insert(
            array(
                'plan'=> 'Business',
                'credit' => 50000,
                'phoneNumber' => 50000,
                'dataFilter' => 'Data Filters',
                'csvExport' => 'CSV Export',
                'price' => 400,
            ),
        );
        DB::table('set_purchase_plans')->insert(
            array(
                'plan'=> 'Business Pro',
                'credit' => 300000,
                'phoneNumber' => 300000,
                'dataFilter' => 'Data Filters',
                'csvExport' => 'CSV Export',
                'price' => 1000,
            ),
        );
        DB::table('set_purchase_plans')->insert(
            array(
                'plan'=> 'Enterprise',
                'credit' => 1000000,
                'phoneNumber' => 1000000,
                'dataFilter' => 'Data Filters',
                'csvExport' => 'CSV Export',
                'price' => 1500,
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
        Schema::dropIfExists('set_purchase_plans');
    }
}
