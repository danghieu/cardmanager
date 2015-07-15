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
			$table->integer('city')->unsigned()->nullable();
			$table->string('dictrict');
			$table->string('street');
			$table->timestamps();
			$table->foreign('city')->references('id')->on('City')->onDelete('cascade');
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
