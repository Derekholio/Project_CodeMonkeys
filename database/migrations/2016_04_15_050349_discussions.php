<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Discussions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discussions', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('task_id')->unsigned();
            $table->foreign('task_id')->references('id')->on('tasks');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('message');

            $table->dateTime('posted_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('discussions', function($table){
           $table->dropForeign('discussions_user_id_foreign');
        });
        Schema::drop('discussions');
    }
}
