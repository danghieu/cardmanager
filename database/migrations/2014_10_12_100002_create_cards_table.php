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
			$table->integer('status')->default(0);
			$table->integer('owner')->unsigned()->nullable();
			$table->integer('vehicle')->unsigned()->nullable();
			$table->integer('card_budget')->unsigned()->nullable();
			$table->foreign('owner')->references('id')->on('Owner_info')->onDelete('cascade');
			$table->foreign('vehicle')->references('id')->on('Vehicle_info')->onDelete('cascade');
			$table->date('date_issuance');
			$table->integer('place_issuance')->unsigned()->nullable();
			$table->foreign('place_issuance')->references('id')->on('City')->onDelete('cascade');
			$table->string('level')->default(1);
			$table->foreign('card_budget')->references('id')->on('Card_Budget')->onDelete('cascade');
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
