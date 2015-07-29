<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class VehicleType extends Model {


	protected $table = 'Vehicle_type';

	public function addvehicle($name){
		$this->name=$name;
		$this->save();
	}

	public static function vehicle_exist($name) {
		$name = "%".$name."%";
		if(City::where('name',"LIKE",$name)->count()>0)
			return true;
		else
			return false;
	}
}
