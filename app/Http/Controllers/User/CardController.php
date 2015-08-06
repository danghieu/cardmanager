<?php namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Redirector;
use App\VehicleType;
use App\User;
use Auth;
class CardController extends Controller {

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
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('home');
	}

	public function cardinfo()
	{
		return view('user.cardinfo');
	}

	public function cardinfoview(Request $request)
	{
		$cardnumber = $request->get("cardnumber");
		$card = new Card();
		$card =$card->getCardByNumber($cardnumber);
		$data = compact('card');
		return view('user.cardinfoview',$data);
	}
	public function addcardinfo()
	{
		$vehicle_type=VehicleType::all();
		$data = compact('vehicle_type');
		return view('user.addcardinfo',$data);
	}

	public function addcardinfopost(Request $request)
	{
		$vehicle_type=VehicleType::all();
		$data = compact('vehicle_type');
		$rules = array(
		    'cardnumber'				=> 'required|min:8|max:8',
		    'lastname'    				=> 'required|min:1',
		    'firstname'					=> 'required|min:1',
		    'indentify_card'			=> 'required|min:9',
		    'vehicle_type'				=> 'required|min:1',
		    'vehicle_brand'				=> 'required|min:1',	
		    'vehicle_plates_number'		=> 'required|min:4',
		);

		$validator = Validator::make($request->all(), $rules);
		if ($validator->fails()) {

		    return view('user.addcardinfo',$data)
		    	->withInput($request)
		        ->withErrors($validator); 
  
		}else {
			$cardnumber=$request->get('cardnumber');
			$lastname = $request->get('lastname');
			$firstname = $request->get('firstname');
			$indentify_card = $request->get('indentify_card');
			$vehicle_type = $request->get('vehicle_type');
			$vehicle_brand =$request->get('vehicle_brand');
			$vehicle_plates_number =$request->get('vehicle_plates_number');
			$card = new Card();
			$card =$card->getCardByNumber($cardnumber);
			if($card==null)
				 return view('user.addcardinfo',$data)->with('fail', "Thẻ này không tồn tại!")->withInput($request);
			else if($card->user!=null)
				 return view('user.addcardinfo',$data)->with('fail', "Thẻ này đã có người dùng!")->withInput($request);
			else {
				if($card->ownerInfo->last_name==$lastname&&$card->ownerInfo->first_name==$firstname
					&&$card->ownerInfo->indentify_card==$indentify_card&&$card->vehicleInfo->vehicle_type==$vehicle_type
					&&$card->vehicleInfo->brand==$vehicle_brand&&$card->vehicleInfo->plates_number==$vehicle_plates_number){
					Auth::user()->Card()->save($card);
					$data = compact('vehicle_type','card');
					return view('user.cardinfoview',$data);
				}else {
				 	return view('user.addcardinfo',$data)->with('fail', "Thông tin Không hợp lệ!")->withInput($request);
				}

			}
		}

		$cardnumber = $request->get("cardnumber");
		$card = new Card();
		$card =$card->getCardByNumber($cardnumber);
		$data = compact('card');
		return view('user.cardinfoview',$data);
	}

}
