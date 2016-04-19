<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Color extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('color', function($table){
            $table->integer('id');
            $table->string('color_text');
        });

        DB::table('color')->insert(
            array('id' => 1, 'color_text' => 'Red')
        );

        DB::table('color')->insert(
            array('id' => 2, 'color_text' => 'Blue')
        );

        DB::table('color')->insert(
            array('id' => 3, 'color_text' => 'Green')
        );

        DB::table('color')->insert(
            array('id' => 4, 'color_text' => 'Yellow')
        );

        DB::table('color')->insert(
            array('id' => 5, 'color_text' => 'Orange')
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
