<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesInOrderTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('properties_in_order', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('property_id')->unsigned();
            $table->integer('order_id')->unsigned();
            $table->string('value');
            $table->timestamps();
            $table->foreign('property_id')->references('id')->on('order_properties');
            $table->foreign('order_id')->references('id')->on('orders');

        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('properties_in_order');
	}

}
