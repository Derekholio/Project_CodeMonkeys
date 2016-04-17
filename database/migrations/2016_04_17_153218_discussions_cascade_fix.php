<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DiscussionsCascadeFix extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('discussions', function($table){
           $table->dropForeign('discussions_user_id_foreign');
           $table->dropForeign('discussions_task_id_foreign');
           
           $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');//Delete discussions for a task when the task is deleted
           $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');//Delete discussion posts by a user when the user is deleted
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
