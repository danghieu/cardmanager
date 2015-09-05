<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFeeMonthAndFeeQuarterToStationFeeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('station_fee', function(Blueprint $table)
		{
			//
			$table->string('fee_month');
			$table->string('fee_quarter');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('station_fee', function(Blueprint $table)
		{
			//
		});
	}

}
