<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Card;
use App\City;
class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
		Card::create(array(
			'number' => '0123456789'
		));
		User::create(array(
			'name' => 'user',
			'email' => 'user@admin.com',
			'password' => bcrypt('user'),
			'level' => 1
			
		));
		User::create(array(
			'name' => 'super',
			'email' => 'super@super.com',
			'password' => bcrypt('super'),
			'level' => 2
			
		));
		User::create(array(
			'name' => 'admin',
			'email' => 'admin@admin.com',
			'password' => bcrypt('admin'),
			'level' => 3
			
		));
		

		
		// $this->call('UserTableSeeder');
	}

}
