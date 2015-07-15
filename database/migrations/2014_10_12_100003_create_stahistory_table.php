<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStahistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Station_history', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('card')->unsigned();
			$table->foreign('card')->references('id')->on('Cards')->onDelete('cascade');
			$table->datetime('date');
			$table->string('info');
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
		Schema::drop('Station_history');
	}

}
