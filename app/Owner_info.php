<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use App\Card;
use App\City;
class Owner_info extends Model {


	protected $table = 'Owner_info';

	public function Card()
    {
        return $this->hasMany('App\Card', 'owner');
    }
    public function City()
    {
        return $this->hasOne('App\City', 'city');
    }
    public  function AddinfoOwner($input)
    {	
    	$card = new Card();
    	$card = $card->getCardByNumber($input->get('cardnumber'));
    	$card->addInfoCard($input);
    	$Owner_info = new Owner_info();
    	$Owner_info->last_name=$input->get("lastname");
    	$Owner_info->first_name=$input->get("firstname");
    	$Owner_info->indentify_card=$input->get("indentify_card");
    	$Owner_info->birthday=$input->get("birthday");
    	$Owner_info->phone_number=$input->get("phonenumber");
    	//$Owner_info->nationality=$input->get("nationality");
    	$Owner_info->city=$input->get("city");
    	$Owner_info->district=$input->get("district");
    	$Owner_info->street=$input->get("street");
    	$Owner_info->save();
    	$Owner_info->Card()->save($card);


    }
}
