<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuChildrenTable extends Migration
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
        Schema::create('menu_children', function (Blueprint $table) {
            $this->schemaCreateStartWith($table);
            $table->unsignedInteger('menu_id');
            $table->unsignedInteger('menu_children_id')->nullable();
            $table->enum('link_type', ['Article', 'Category', 'Page', 'Custom']);
            $table->text('url')->nullable();
            $table->string('css_class')->nullable();
            $table->integer('order_no')->default(0);
            $table->integer('depth')->default(0);
            $this->schemaCreateEndWith($table);
            $table->foreign('menu_id')->references('id')->on('menus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('menu_children');
    }
}
