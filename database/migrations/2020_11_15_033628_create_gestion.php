<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGestion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gestion', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('gestion');
            $table->unsignedBigInteger('user_create');
            $table->foreign('user_create')->references('id')->on('users');
            $table->boolean('status_gestion')->default(false);
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
        Schema::dropIfExists('gestion');
    }
}
