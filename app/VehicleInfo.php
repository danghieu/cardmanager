<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class VehicleInfo extends Model {


	protected $table = 'Vehicle_info';
	public function Card()
    {
        return $this->hasOne('App\Card', 'vehicle');
    }
    public function vehicleType()
    {
        return $this->hasOne('App\VehicleType', 'vehicle_type');
    }
    public  function AddinfoVehicle($input)
    {	
    	$card = new Card();
    	$card = $card->getCardByNumber($input->get('cardnumber'));
    	$VehicleInfo = new VehicleInfo();
    	$VehicleInfo->vehicle_type=$input->get("vehicle_type");
    	$VehicleInfo->brand=$input->get("vehicle_brand");
    	$VehicleInfo->VIN=$input->get("vehicle_VIN");
    	$VehicleInfo->plates_number=$input->get("vehicle_plates_number");
    	$VehicleInfo->color=$input->get("vehicle_color");
    	$VehicleInfo->cylinder_capacity=$input->get("vehicle_cylinder_capacity");
    	$VehicleInfo->save();
    	$VehicleInfo->Card()->save($card);


    }

}
