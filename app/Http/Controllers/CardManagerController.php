<?php namespace App\Http\Controllers;

use App\Card;
use App\City;
use App\Owner_info;
use App\VehicleType;
use App\VehicleInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Redirector;

class CardManagerController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('admin');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('admin.cardmanager.cardmanager');
	}
	public function cardslistview()
	{
		return view('admin.cardmanager.cardslistview');
	}
	public function cardslist(Request $request)
	{
		$type =$request->get('type');
		if(!is_numeric($request->get('type')))
			$cards=Card::all();
		else $cards=Card::getCardsList($type);

		$stt=1;
		$data=compact('cards','stt');
		return view('admin.cardmanager.cardslist',$data);
	}
	public function cardslistpost(Request $request)
	{
		$cardnumber =$request->get('q');
		$cards=Card::CardsSearch($cardnumber);
		$stt=1;
		$data=compact('cards','stt');
		return view('admin.cardmanager.cardslist',$data);
	}

	public function addcardview()
	{
		return view('admin.cardmanager.addcardview');
	}

	public function addcard(Request $request)
	{
		$rules = array(
		    'cardnumber'    => 'required|min:8|max:8'
		);

		$validator = Validator::make($request->all(), $rules);

		if ($validator->fails()) {
		    return view('admin.cardmanager.addcardview')
		        ->withErrors($validator) 
		        ->withInput($request); 
		} else {
			if((Card::cardnumber_exist($request->get('cardnumber'))=="true"))
				return  view('admin.cardmanager.addcardview')->with('fail', "Thẻ này đã tồn tại!");
			else{
				$card = new Card();
				$card->createcard($request->get('cardnumber'));
		    	return  view('admin.cardmanager.addcardview')->with('success', "Thêm Thẻ thành công!");
			}
		}
	}
	public function cardissuanceinput()
	{	
		return view('admin.cardmanager.cardissuanceinput');
	}

	public function getcardissuance()
	{	
		$card = new Card();
		$card=$card->getcardtoissuance();
		if($card!=null){
			$data=compact('card');
			return view('admin.cardmanager.cardissuanceinput',$data);
		}else return  view('admin.cardmanager.cardissuanceinput')->with('fail', "Hết thẻ để cấp! Vui lòng thêm thẻ!"); 

		
	}
	public function cardissuanceinputpost(Request $request)
	{	
		$cardnumber = $request->get('cardnumber');
		$city=City::all();
		$vehicle_type=VehicleType::all();
		$rules = array(
		    'cardnumber'    => 'required|min:8|max:8'
		);
		$validator = Validator::make($request->all(), $rules);
		if ($validator->fails()) {

		    return view('admin.cardmanager.cardissuanceinput')
		    	->withInput($request)
		        ->withErrors($validator); 
		}else {
			$card = new Card();
			$card =$card->getCardByNumber($cardnumber);
			$data=compact('city','vehicle_type','card');
			if($card==null)	return  view('admin.cardmanager.cardissuanceinput')->with('fail', "Thẻ này không tồn tại!")->withInput($request); 
			else if ($card->status==1)return  view('admin.cardmanager.cardissuanceinput')->with('fail', "Thẻ này đã cấp!")->withInput($request); 
			else if ($card->status==2)return  view('admin.cardmanager.cardissuanceinput')->with('fail', "Thẻ này đã khóa!")->withInput($request); 
			else return //dd($card);
			view('admin.cardmanager.cardissuanceview',$data);
		}

		return  view('admin.cardmanager.cardissuanceinput'); 
	}
	public function cardissuanceview()
	{	
		$city=City::all();
		$vehicle_type=VehicleType::all();
		$data=compact('city','vehicle_type');
		return view('admin.cardmanager.cardissuanceview',$data);
	}

	public function check_cardtoissuance(Request $request){
		$cardnumber=$request->get("cardnumber");
		$card = new Card();
		$card =$card->getCardByNumber($cardnumber);
		if($card!=null)
			if($card->status==0)
				return 'true';
		else return "false";

	}

	public function cardissuance(Request $request)
	{
		$city=City::all();
		$vehicle_type=VehicleType::all();
		$cardnumber=$request->get("cardnumber");
		$rules = array(
		    'cardnumber'				=> 'required|min:8|max:8',
		    'lastname'    				=> 'required|min:2',
		    'firstname'					=> 'required|min:1',
		    'indentify_card'			=> 'required|min:9',
		    'birthday'					=> 'required',
		    'phonenumber'				=> 'required|min:6',
		    'city'						=> 'required|min:1',
		    'district'					=> 'required|min:1',
		    'vehicle_type'				=> 'required|min:1',
		    'vehicle_brand'				=> 'required|min:1',
		    'vehicle_VIN'				=> 'required|min:6',
		    'vehicle_plates_number'		=> 'required|min:4',
		    'vehicle_cylinder_capacity'	=> 'required',
		    'vehicle_color'					=> 'required|min:1'
		);

		$validator = Validator::make($request->all(), $rules);

		

			$card = new Card();
			$card =$card->getCardByNumber($cardnumber);
			$data=compact('city','vehicle_type');
			if((Card::cardnumber_exist($cardnumber)=="true")){
				if($card->status==1)
					return  view('admin.cardmanager.cardissuanceview',$data)->with('fail', "Thẻ này đã được cấp!")->withInput($request);
				else if($card->status==2)
					return  view('admin.cardmanager.cardissuanceview',$data)->with('fail', "Thẻ này đã bị khóa!")->withInput($request);					
				else{

					if ($validator->fails()) {

					    return view('admin.cardmanager.cardissuanceview',$data)
					    	->withInput($request)
					        ->withErrors($validator); 
		      
					} else {
						$Owner_info = new Owner_info();
						$Owner_info->AddinfoOwner($request);
						$VehicleInfo = new VehicleInfo();
						$VehicleInfo->AddinfoVehicle($request);
						return  view('admin.cardmanager.cardissuanceview',$data)->with('success', "Thông tin đã được cập nhật!")->withInput($request);
					} 
				}
			}	
			else{		
		    	return  view('admin.cardmanager.cardissuanceview',$data)->with('fail', "Thẻ này không tồn tại!")->withInput($request);
			}
	}

	public function cardinfoinput(){
		return  view('admin.cardmanager.cardinfoinput'); 
	}

	public function cardinfoinputpost(Request $request){
		$cardnumber = $request->get('cardnumber');
		$city=City::all();
		$vehicle_type=VehicleType::all();
		$rules = array(
		    'cardnumber'    => 'required|min:8|max:8'
		);
		$validator = Validator::make($request->all(), $rules);
		if ($validator->fails()) {

		    return view('admin.cardmanager.cardinfoinput')
		    	->withInput($request)
		        ->withErrors($validator); 
		}else {
			$i=0;
			$card = new Card();
			$card =$card->getCardByNumber($cardnumber);
			$data=compact('city','vehicle_type','card','i');
			if($card==null)	return  view('admin.cardmanager.cardinfoinput')->with('fail', "Thẻ này không tồn tại!")->withInput($request); 
			else return //dd($card);
			view('admin.cardmanager.cardinfoview',$data);
		}

		return  view('admin.cardmanager.cardinfoinput'); 

	}

}
