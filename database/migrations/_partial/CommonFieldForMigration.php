<?php
/**
 * Created by PhpStorm.
 * User: mainul
 * Date: 8/28/16
 * Time: 2:26 PM
 */
use Illuminate\Database\Schema\Blueprint;

trait CommonFieldForMigration
{

    /**
     * Add title and slug
     *
     * @param Blueprint $table
     */
    public function schemaCreateStartWith(Blueprint $table)
    {
        $table->increments('id');
        $table->string('title');
        $table->string('slug')->unique();
    }

    /**
     * add Timestamp, Created by and updated by
     *
     * @param Blueprint $table
     */
    public function schemaCreateEndWith(Blueprint $table)
    {
        $table->unsignedInteger('created_by');
        $table->unsignedInteger('updated_by');
        $table->timestamps();
        $table->softDeletes();
        $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
    }


    /**
     * Drop Create by and Updated by Foreign Relation
     *
     * @param $table_name
     */
    public function dropCommonForeignKey($table_name)
    {
        Schema::table($table_name, function (Blueprint $table) {
            $table->dropForeign(['created_by']);
            $table->dropForeign(['updated_by']);
        });
    }
}