<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Status extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status', function($table){
            $table->integer('id');
            $table->string('status_text');
        });

        DB::table('status')->insert(
            array('id' => 0, 'status_text' => 'New task')
        );

        DB::table('status')->insert(
            array('id' => 1, 'status_text' => 'In progress')
        );

        DB::table('status')->insert(
            array('id' => 2, 'status_text' => 'Completed')
        );
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
