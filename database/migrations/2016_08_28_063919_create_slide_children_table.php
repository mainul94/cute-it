<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlideChildrenTable extends Migration
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
        Schema::create('slide_children', function (Blueprint $table) {
            $this->schemaCreateStartWith($table);
            $table->longText('caption')->nullable();
            $table->string('image')->nullable();
            $table->string('bg_color',40)->nullable();
            $table->unsignedInteger('slide_id');
            $table->string('style')->nullable();
            $table->timestamps();
            $table->foreign('slide_id')->references('id')->on('slides');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('slide_children');
    }
}
