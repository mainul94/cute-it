<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelationArticleWithCountry extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_country', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('article_id');
            $table->unsignedInteger('country_id');
            $table->timestamps();
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('article_country', function (Blueprint $table) {
            $table->dropForeign(['article_id']);
            $table->dropForeign(['country_id']);
        });

        Schema::drop('article_country');
    }
}
