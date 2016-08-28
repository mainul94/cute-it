<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Use Common field for created by, Updated by, Title, slug.
     */
    use CommonFieldForMigration;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $this->schemaCreateStartWith($table);
            $table->longText('content')->nullable();
            $table->text('summery')->nullable();
            $table->string('feature_image')->nullable();
            $table->string('feature_caption')->nullable();
            $table->string('bg_color',40)->nullable();
            $table->string('sidebar_bg_color',40)->nullable();
            $table->unsignedInteger('slide_id')->nullable();
            $table->string('slide_position')->nullable();
            $this->schemaCreateEndWith($table);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $this->dropCommonForeignKey('articles');

        Schema::drop('articles');
    }
}
