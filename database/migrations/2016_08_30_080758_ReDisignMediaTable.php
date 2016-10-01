<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReDisignMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('media', function (Blueprint $table) {
            $table->dropTimestamps();
        });
        Schema::table('media', function (Blueprint $table) {
            $table->string('title')->after('id');
            $table->string('slug')->unique();
            $table->string('file_name');
            $table->string('url');
            $table->string('thumbnail_url');
            $table->string('preview_rul');
            $table->string('file_type');
            $table->string('file_size');
            $table->string('file_dimension');
            $table->text('caption');
            $table->string('alt');
            $table->text('description');
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('media', function (Blueprint $table) {
            $table->dropForeign(['created_by']);
            $table->dropForeign(['updated_by']);
            $table->dropColumn(['title', 'slug', 'file_name', 'file_type', 'file_size','file_dimension','caption',
                'alt','description','created_by','updated_by','url','thumbnail_url','preview_rul']);
            $table->dropSoftDeletes();
        });
    }
}
