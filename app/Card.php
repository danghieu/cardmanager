<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use App\Owner_info;
use App\City;
use App\PrePay;
use App\CardBudget;
use App\VehicleInfo;
class Card extends Model {
	protected $table = 'cards';
	public function ownerInfo()
    {
        return $this->belongsTo('App\Owner_info', 'owner');
    }
    public function vehicleInfo()
    {
        return $this->belongsTo('App\VehicleInfo', 'vehicle');
    }

    public function City()
    {
        return $this->belongsTo('App\City', 'place_issuance');
    }
    public function CardBudget()
    {
        return $this->belongsTo('App\CardBudget', 'card_budget');
    }
    public function PrePay()
    {
        return $this->hasMany('App\PrePay', 'card');
    }
	public function createcard($number){
		$this->number=$number;
		$this->save();
	}

    public function getcardtoissuance(){
        $cards = Card::where('status',0);
        if($cards->count()>0){
            $card=$cards->first();
            return $card;
        }
        else
            return null;
    }

	public static function cardnumber_exist($cardnumber) {
		if(Card::where("number","=",$cardnumber)->count()>0)
			return true;
		return false;
	}

	public function getCardByNumber($cardnumber)
    {
    	$cards = Card::where('number',$cardnumber);
    	if($cards->count()>0){
    		$card=$cards->first();
    		return $card;
    	}
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
		$card->place_issuance=date('Y-m-d', strtotime($input->get("place_issuance")));
		$card->date_issuance=date('Y-m-d', strtotime($input->get("date_issuance")));
        $card->status=1;
        $card->save();
        $card_budget= new CardBudget();
        $card_budget->card_budget_number = substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789',9)),0,9);
        $card_budget->save();
        $card_budget->Card()->save($card);
 
	}

    public function editInfoCard($input){
        $this->status=$input->get('status');
        $this->place_issuance=$input->get("place_issuance");
        $this->date_issuance=$input->get("date_issuance");
        $this->save();
        $ownerinfo = Owner_info::find($this->owner);
        $ownerinfo->last_name=$input->get("lastname");
        $ownerinfo->first_name=$input->get("firstname");
        $ownerinfo->indentify_card=$input->get("indentify_card");
        $ownerinfo->birthday=$input->get("birthday");
        $ownerinfo->phone_number=$input->get("phonenumber");
        $ownerinfo->city=$input->get("city");
        $ownerinfo->district=$input->get("district");
        $ownerinfo->street=$input->get("street");
        $ownerinfo->save();
        $VehicleInfo = VehicleInfo::find($this->vehicle);
        $VehicleInfo->vehicle_type=$input->get("vehicle_type");
        $VehicleInfo->brand=$input->get("vehicle_brand");
        $VehicleInfo->VIN=$input->get("vehicle_VIN");
        $VehicleInfo->plates_number=$input->get("vehicle_plates_number");
        $VehicleInfo->color=$input->get("vehicle_color");
        $VehicleInfo->cylinder_capacity=$input->get("vehicle_cylinder_capacity");
        $VehicleInfo->save();
        $CardBudget = CardBudget::find($this->card_budget);
        $CardBudget->turn_number = $input->get("turnnumber");
        $CardBudget->save();
        if($input->get("card_prepay_id")==''){
            $PrePay = new PrePay();
            $this->PrePay()->save($PrePay);
            $PrePay->start_date=date('Y-m-d', strtotime($input->get("date_start")));
            $PrePay->expiry_date=date('Y-m-d', strtotime($input->get("expiry_date")));
            $PrePay->save();
        }else {
            $PrePay = PrePay::find($input->get("card_prepay_id"));
            $PrePay->start_date=date('Y-m-d', strtotime($input->get("date_start")));
            $PrePay->expiry_date=date('Y-m-d', strtotime($input->get("expiry_date")));
            $PrePay->save();
        }
        
        
        
    }
}
