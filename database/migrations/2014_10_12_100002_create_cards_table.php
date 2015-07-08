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
			$table->integer('id_owner')->unsigned();
			$table->integer('id_vehicle')->unsigned();
			$table->integer('id_budget')->unsigned();
			$table->foreign('id_owner')->references('id')->on('Owner_info')->onDelete('cascade');
			$table->foreign('id_vehicle')->references('id')->on('Vehicle_info')->onDelete('cascade');
			$table->string('date_issuance');
			$table->string('place_issuance');
			$table->string('level');
			$table->foreign('id_budget')->references('id')->on('Budget')->onDelete('cascade');
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
