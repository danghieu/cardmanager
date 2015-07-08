<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBudgethistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Budget_history', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('id_budget');
			$table->string('amount');
			$table->string('info');
			$table->datetime('date');
			$table->string('action');
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
		Schema::drop('Budget_history');
	}

}
