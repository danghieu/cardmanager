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
			$table->integer('id_owner')->unsigned()->nullable();
			$table->integer('id_vehicle')->unsigned()->nullable();
			$table->integer('id_budget')->unsigned()->nullable();
			$table->foreign('id_owner')->references('id')->on('Owner_info')->onDelete('cascade');
			$table->foreign('id_vehicle')->references('id')->on('Vehicle_info')->onDelete('cascade');
			$table->string('date_issuance');
			$table->string('place_issuance');
			$table->string('level')->default(1);
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
