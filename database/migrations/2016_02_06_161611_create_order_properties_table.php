<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderPropertiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order_properties', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('active')->nullable();
            $table->string('name');
            $table->string('code')->nullable();
            $table->string('sort')->nullable();
            $table->string('xml_id')->nullable();
            $table->integer('modified_by')->unsigned();

            $table->timestamps();
            $table->foreign('modified_by')->references('id')->on('users');

        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('order_properties');
	}

}
