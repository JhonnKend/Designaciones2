<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('ap_pat');
            $table->string('ap_mat');
            $table->string('ci');
            $table->string('exp');
            $table->date('birth_date');
            $table->string('celular');
            $table->boolean('type');
            $table->string('correo');
            $table->string('direccion');
            $table->string('sexo');
            $table->unsignedBigInteger('insti_id');
            $table->unsignedBigInteger('carrer_id');
            $table->unsignedBigInteger('level_ac');
            $table->unsignedBigInteger('caso_esp');
            $table->unsignedBigInteger('id_date_enabled');
            $table->foreign('id_date_enabled')->references('id')->on('enable_periods');
            $table->foreign('insti_id')->references('id')->on('careers_institute');
            $table->foreign('carrer_id')->references('id')->on('career');
            $table->foreign('caso_esp')->references('id')->on('casos');            
            $table->unsignedBigInteger('user_create');
            $table->foreign('user_create')->references('id')->on('users');
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
        Schema::dropIfExists('student');
    }
}
