<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use App\Owner_info;
class Card extends Model {
	protected $table = 'cards';
	public function ownerInfo()
    {
        return $this->belongsTo('App\Owner_info', 'id_owner');
    }
    public function vehicleInfo()
    {
        return $this->belongsTo('App\VehicleInfo', 'id_vehicle');
    }
	public function createcard($number){
		$this->number=$number;
		$this->save();
	}

	public static function cardnumber_exist($cardnumber) {
		if(Card::where("number","=",$cardnumber)->count()>0)
			return true;
		return false;
	}

	public function getCardByNumber($cardnumber)
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

	public static function CardsSearch($cardnumber) {
		$cardnumber="%".$cardnumber."%";
		return Card::where('number','LIKE' ,$cardnumber)->get();
	}

	public  function addInfoCard($input) {
		$card = Card::getCardByNumber($input->get('cardnumber'));
		$card->status=1;
		$card->place_issuance=$input->get("place_issuance");
		$card->date_issuance=$input->get("date_issuance");
		$card->save();
	}
}
