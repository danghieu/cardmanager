<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOwnerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Owner_info', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('last_name');
			$table->string('first_name');
			$table->string('indentify_card');
			$table->date('birthday');
			$table->string('phone_number');
			$table->string('nationality');
			$table->integer('city')->unsigned()->nullable();
			$table->foreign('city')->references('id')->on('City')->onDelete('cascade');
			$table->string('district');
			$table->string('street');
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
		Schema::drop('Owner_info');
	}

}
