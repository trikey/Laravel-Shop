<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSizesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sizes', function(Blueprint $table) {
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
			$table->string('code')->unique()->nullable();
			$table->string('meta_title')->nullable();
			$table->string('meta_keywords')->nullable();
			$table->string('meta_description')->nullable();
			$table->integer('modified_by')->unsigned();
			$table->integer('product_id')->unsigned();
			$table->integer('quantity')->unsigned()->nullable();
			$table->string('chest')->nullable();
			$table->string('waist')->nullable();
			$table->string('thigh')->nullable();
			$table->string('sleeve_length')->nullable();
			$table->string('sleeve_width')->nullable();
			$table->string('length')->nullable();
			$table->timestamps();

			$table->foreign('modified_by')->references('id')->on('users');
			$table->foreign('product_id')->references('id')->on('products');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
//		Schema::drop('sizes');
	}

}
