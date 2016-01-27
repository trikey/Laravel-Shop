<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddParentIdToSectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('sections', function(Blueprint $table)
        {
            $table->integer('parent_id')->unsigned();
            $table->foreign('parent_id')->references('id')->on('sections');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('sections', function (Blueprint $table) {
            $table->dropForeign('parent_id');
            $table->dropColumn('parent_id');
        });
	}

}
