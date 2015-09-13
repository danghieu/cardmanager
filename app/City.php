<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class City extends Model {


	protected $table = 'city';

	public static function findCities($searched) {
		$searched = "%".$searched."%";
		return City::where('name','LIKE' ,$searched)->get();
	}

	public function addcity($name){
		$this->name=$name;
		$this->save();
	}

	public static function findCityById($id) {
		return City::where('id','=',$id)->get();
	}

	public static function updateCity($id,$name) {
		City::where('id','=',$id)->update(['name' => $name]);
	}

	public static function city_exist($cityname) {
		$cityname = "%".$cityname."%";
		if(City::where('name',"LIKE",$cityname)->count()>0)
			return true;
		else
			return false;
	}
}
