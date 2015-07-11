<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
class Card extends Model {
	protected $table = 'cards';

	public function createcard($number){
		$this->number=$number;
		$this->save();
	}

	public static function cardnumber_exist($cardnumber) {
		if(Card::where("number","=",$cardnumber)->count()>0)
			return true;
		return false;
	}

	public static function getCardByNumber($cardnumber)
    {
    	$cards = Card::where('number',$cardnumber);
    	if($cards->count()>0)
    		return $cards->first();
    	else
    		return null;
    }

	public static function getCardsList($type) {
		return Card::where('status', $type)->get();
	}
}
