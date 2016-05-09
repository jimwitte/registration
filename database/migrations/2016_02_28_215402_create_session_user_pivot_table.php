<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionUserPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('session_user', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->foreign('session_id')->references('id')->on('sessions')->onDelete('cascade');
            $table->integer('session_id')->unsigned()->index();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('user_id')->unsigned()->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('session_user');
    }
}
