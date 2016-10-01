<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
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
        Schema::create('categories', function (Blueprint $table) {
            $this->schemaCreateStartWith($table);
            $table->longText('content')->nullable();
            $table->text('summery')->nullable();
            $table->string('feature_image')->nullable();
            $table->string('feature_caption')->nullable();
            $table->string('bg_color',40)->nullable();
            $table->unsignedInteger('slide_id')->nullable();
            $table->string('template')->nullable(); // Todo when view in font end then check temple is null or Not
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
//        $this->dropCommonForeignKey('categories');
        Schema::drop('categories');
    }
}
