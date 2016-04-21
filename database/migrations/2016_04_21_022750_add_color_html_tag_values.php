<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColorHtmlTagValues extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('color')->where('id', 1)->update(['color_html_tag' =>'rgba(255, 0, 0, 0.53)']);
        DB::table('color')->where('id', 2)->update(['color_html_tag' => 'rgba(0, 0, 255, 0.54)']);
        DB::table('color')->where('id', 3)->update(['color_html_tag' => 'rgba(0, 128, 0, 0.6)']);
        DB::table('color')->where('id', 4)->update(['color_html_tag' => 'rgba(255, 255, 0, 0.43)']);
        DB::table('color')->where('id', 5)->update(['color_html_tag' => 'rgba(255, 153, 0, 0.56)']);
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
