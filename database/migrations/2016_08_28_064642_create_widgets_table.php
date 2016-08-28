<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWidgetsTable extends Migration
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
        Schema::create('widgets', function (Blueprint $table) {
            $this->schemaCreateStartWith($table);
            $table->string('type')->nullable();
            $table->longText('content')->nullable();
            $table->text('summery')->nullable();
            $table->string('feature_image')->nullable();
            $table->string('feature_caption')->nullable();
            $table->string('bg_color',40)->nullable();
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
        $this->dropCommonForeignKey('categories');
        Schema::drop('widgets');
    }
}
