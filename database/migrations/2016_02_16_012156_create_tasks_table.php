<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
         * Tasks specifications:
         * Title (name)
         * Description
         * Assigned user (FK to users table)
         * Priority
         * Due date
         * Category (FK to category table)
         * Color
         * Discussion thread
         */
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->integer('assignee_id');
            $table->integer('priority_id');
            $table->date('due');
            $table->integer('category_id');
            $table->integer('color_id');
            $table->integer('discussion_id');
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
        Schema::drop('tasks');
    }
}
