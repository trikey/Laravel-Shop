<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('sections', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('active')->nullable();
            $table->timestamp('active_from')->nullable();
            $table->timestamp('active_till')->nullable();
            $table->integer('sort')->unsigned()->nullable();
            $table->string('name');
            $table->string('preview_picture')->nullable();
            $table->text('preview_text')->nullable();
            $table->string('detail_picture')->nullable();
            $table->text('detail_text')->nullable();
            $table->string('xml_id')->nullable();
            $table->string('code')->unique();
            $table->string('meta_title')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('meta_description')->nullable();
            $table->integer('modified_by')->unsigned();
            $table->integer('parent_id')->unsigned()->nullable()->default(null);
            $table->timestamps();

            $table->foreign('modified_by')->references('id')->on('users');
        });

//        Schema::table('sections', function(Blueprint $table) {
//            $table->foreign('parent_id')->references('id')->on('sections');
//        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
//		Schema::drop('sections');
	}

}
