<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Cards', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('number');
			$table->string('status');
			$table->string('id_owner');
			$table->string('id_vehicle');
			$table->string('date_issuance');
			$table->string('place_issuance');
			$table->string('level');
			$table->string('id_budget');
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
		Schema::drop('Cards');
	}

}
