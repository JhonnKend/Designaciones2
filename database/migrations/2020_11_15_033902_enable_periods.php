<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EnablePeriods extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enable_periods', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date_start');
            $table->date('date_end');
            $table->unsignedBigInteger('id_gestion');
            $table->foreign('id_gestion')->references('id')->on('gestion');
            $table->unsignedBigInteger('id_period');
            $table->foreign('id_period')->references('id')->on('periods');
            $table->unsignedBigInteger('user_create');
            $table->foreign('user_create')->references('id')->on('users');
            $table->unsignedBigInteger('user_edit');
            $table->foreign('user_edit')->references('id')->on('users');
            $table->boolean('status_')->default(false);
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
        //
    }
}
