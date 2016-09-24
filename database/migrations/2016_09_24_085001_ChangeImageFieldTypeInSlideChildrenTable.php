<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeImageFieldTypeInSlideChildrenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('slide_children', function (Blueprint $table) {
            $table->integer('image')->unsigned()->change();
            $table->foreign('image')->references('id')->on('media');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('slide_children', function (Blueprint $table) {
            $table->dropForeign(['image']);
        });
    }
}
