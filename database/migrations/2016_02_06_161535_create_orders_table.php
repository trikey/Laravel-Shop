<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table) {
			$table->increments('id');
			$table->string('total_price')->nullable();
			$table->string('delivery_price')->nullable();
			$table->integer('pay_system_id')->unsigned()->nullable();
			$table->integer('delivery_id')->unsigned()->nullable();
			$table->string('xml_id')->nullable();
			$table->integer('modified_by')->unsigned();
			$table->timestamps();

			$table->foreign('modified_by')->references('id')->on('users');
			$table->foreign('pay_system_id')->references('id')->on('pay_systems');
			$table->foreign('delivery_id')->references('id')->on('delivery_systems');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('orders');
	}

}
