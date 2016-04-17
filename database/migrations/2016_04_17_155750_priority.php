<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Priority extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('priority', function($table){
            $table->integer('id');
            $table->string('priority_text');
            $table->text('priority_icon_html');
        });
        
        DB::table('priority')->insert(
                array('id' => 1, 'priority_text' => 'Low', 'priority_icon_html' => "<i class='fa fa-arrow-down' style='color:green;' aria-hidden='true'></i>")
        );
        
        DB::table('priority')->insert(
                array('id' => 2, 'priority_text' => 'Medium', 'priority_icon_html' => "<i class='fa fa-arrow-up' style='color:yellow;' aria-hidden='true'></i>")
        );
        
        DB::table('priority')->insert(
                array('id' => 3, 'priority_text' => 'High', 'priority_icon_html' => "<i class='fa fa-exclamation-triangle' style='color:red;' aria-hidden='true'></i>")
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('priority');
    }
}
