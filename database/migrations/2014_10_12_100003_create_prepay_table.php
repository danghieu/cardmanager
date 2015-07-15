<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrepayTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Prepay', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('card')->unsigned();
			$table->foreign('card')->references('id')->on('Cards')->onDelete('cascade');
			$table->date('start_date');
			$table->date('expiry_date');
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
		Schema::drop('Prepay');
	}

}
