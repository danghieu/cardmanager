<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class City extends Model {


	protected $table = 'city';

	public static function findCities($searched) {
		$searched = "%".$searched."%";
		return City::where('name','LIKE' ,$searched)->get();
	}
}
