<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Card extends Model {
	protected $table = 'cards';

	public static function cardnumber_exist($cardnumber) {
		if(Card::where("number","=",$cardnumber)->count()>0)
			return true;
		return false;
	}
	public function createcard($number){
		$this->number=$number;
		$this->save();
	}
}
