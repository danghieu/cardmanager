<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Station', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->integer('id_city')->unsigned();
			$table->string('dictrict');
			$table->string('street');
			$table->timestamps();
			$table->foreign('id_city')->references('id')->on('City')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Station');
	}

}
