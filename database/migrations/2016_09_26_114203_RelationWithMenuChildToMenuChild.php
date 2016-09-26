<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelationWithMenuChildToMenuChild extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('menu_children', function (Blueprint $table) {
            $table->foreign('menu_children_id')->references('id')->on('menu_children');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('menu_children', function (Blueprint $table) {
            $table->dropForeign(['menu_children_id']);
        });
    }
}
