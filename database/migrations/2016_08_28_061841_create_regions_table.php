<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateRegionsTable extends Migration
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
        Schema::create('regions', function (Blueprint $table) {
            $this->schemaCreateStartWith($table);
            $table->text('description')->nullable();
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
        $this->dropCommonForeignKey('regions');
        Schema::dropIfExists('regions');
    }
}
