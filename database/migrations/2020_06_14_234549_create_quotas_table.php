<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_student')->nullable();
            $table->foreign('id_student')->references('id')->on('student');

            $table->unsignedBigInteger('id_stable_salud');
            $table->foreign('id_stable_salud')->references('id')->on('estable_saluds');

            $table->unsignedBigInteger('tipe_internship');
            $table->foreign('tipe_internship')->references('id')->on('internation_types');

            $table->unsignedBigInteger('user_create');
            $table->foreign('user_create')->references('id')->on('users');

            $table->unsignedBigInteger('user_edit')->nullable();

            $table->boolean('status_designation')->default(false);
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('periodo');
            $table->foreign('periodo')->references('id')->on('periods');
            $table->integer('gestion');
            $table->foreign('gestion')->references('id')->on('gestion');
            $table->date('designation_date');
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
        Schema::dropIfExists('quotas');
    }
}
