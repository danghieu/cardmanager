<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVerinfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Vehicle_info', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('vehicle_type');
			$table->string('brand');
			$table->string('VIN');
			$table->string('plates_number');
			$table->string('color');
			$table->string('cylinder_capacity');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Vehicle_info');
	}

}
