<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Card;
use App\City;
use App\Owner_info;
use App\VehicleType;
use App\VehicleInfo;
use App\CardBudget;
class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
		VehicleType::create(array(
			'name' => 'Xe Tai'
		));

		Card::create(array(
			'number' => '87654321'
		));

		City::create(array(
			'name' => 'Ha Noi'
		));
		CardBudget::create(array(
			'turn_number' => 2
		));
		Owner_info::create(array(
			'last_name' => 'Nguyen',
			'first_name' => 'Hieu',
			'indentify_card' => '1567892',
			'phone_number' => '156789',
			'city' => 1,
			'district' => 'Thanh Khe',
			'street' => 'Ly Trien',
		));
		VehicleInfo::create(array(
			'vehicle_type' => 1,
			'brand' => 'ToYoTa',
			'VIN' => '14567890',
			'plates_number' => '43S2-3317',
			'color' => 'Do',
			'cylinder_capacity' => 120,
		));
		Card::create(array(
			'number' => '12345678',
			'status' => 1,
			'owner' => 1,
			'vehicle' => 1,
			'card_budget' => 1,
			'owner' => 1,
			'place_issuance' => 1,
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
