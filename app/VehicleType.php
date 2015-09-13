<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class VehicleType extends Model {


	protected $table = 'Vehicle_type';

	public static function getVehicleTypes($searched) {
		$searched = "%".$searched."%";
		return VehicleType::where('name','LIKE' ,$searched)->get();
	}

	public function addvehicle($name){
		$this->name=$name;
		$this->save();
	}

	public static function findVehicleById($id){
		return VehicleType::where('id','=',$id)->get();
	}

	public static function updateVehicle($id,$name,$fee){
		VehicleType::where('id','=',$id)->update(['name' => $name, 'fee' => $fee]);
	}

	public static function vehicle_exist($name) {
		$name = "%".$name."%";
		if(VehicleType::where('name',"LIKE",$name)->count()>0)
			return true;
		else
			return false;
	}
}