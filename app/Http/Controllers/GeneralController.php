<?php namespace App\Http\Controllers;

use App\City;
use App\VehicleType;
use App\StationFee;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class GeneralController extends Controller {

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
		return view('admin.general.general');
	}

	public function citieslistview(Request $request)
	{
		$id = $request->citynumber;
		$name = $request->cityname;
		City::updateCity($id,$name);
		return view('admin.general.citieslistview');
	}

	public function citieslist(Request $request)
	{
		$searched_name = $request->get('q');
		$cities=City::findCities($searched_name);
		$stt=1;
		$data=compact('cities','stt');
		return view('admin.general.citieslist',$data);
	}

	public function addnewcity()
	{
		return view('admin.general.addnewcity');
	}

	public function postaddnewcity(Request $request)
	{
		$rules = array(
		    'cityname'    => 'required'
		);

		$validator = Validator::make($request->all(), $rules);

		if ($validator->fails()) {
		    return view('admin.general.citieslistview')
		        ->withErrors($validator) 
		        ->withInput($request); 
		} else {
			if((City::city_exist($request->get('cityname'))==true))
				return  view('admin.general.citieslistview')->with('fail', "Tỉnh thành này đã tồn tại!");
			else{
				$city = new City();
				$city->addcity($request->get('cityname'));
		    	return  view('admin.general.citieslistview')->with('success', "Thêm tỉnh thành thành công!");
			}
		}
	}

	public function vehicle(Request $request)
	{
		$id = $request->vehiclenumber;
		$name = $request->vehiclename;
		$fee = $request->vehiclefee;
		VehicleType::updateVehicle($id,$name,$fee);
		return view('admin.general.vehicle');
	}

	public function vehiclelist()
	{
		$vehicles=VehicleType::getVehicleTypes('');
		$stt=1;
		$data=compact('vehicles','stt');
		return view('admin.general.listvehicles',$data);
	}

	public function addnewvehicle()
	{
		return view('admin.general.addnewvehicle');
	}

	public function postaddnewvehicle(Request $request)
	{
		$rules = array(
		    'vehiclename'    => 'required'
		);

		$validator = Validator::make($request->all(), $rules);

		if ($validator->fails()) {
		    return view('admin.general.vehicle')
		        ->withErrors($validator) 
		        ->withInput($request); 
		} else {
			if((VehicleType::vehicle_exist($request->get('vehiclename'))==true))
				return  view('admin.general.vehicle')->with('fail', "Loại xe này đã tồn tại!");
			else{
				$vehicle = new VehicleType();
				$vehicle->addvehicle($request->get('vehiclename'));
		    	return  view('admin.general.vehicle')->with('success', "Thêm loại xe thành công!");
			}
		}
	}

	public function stationfee()
	{
		return view('admin.general.stationfee');
	}

	public function stationfeelist()
	{
		$stationfees=StationFee::all();
		$stt=1;
		$data=compact('stationfees','stt');
		return view('admin.general.stationfeelist',$data);
	}

	public function cauhinhcity(Request $request){
		$id = $request->get('citynumber');
		$city = City::findCityById($id);
		$data = compact('city');
		return view('admin.general.cauhinhcity', $data);
	}

	public function cauhinhvehicle(Request $request){
		$id = $request->get('vehiclenumber');
		$vehicle = VehicleType::findVehicleById($id);
		$data = compact('vehicle');
		return view('admin.general.cauhinhvehicle', $data);
	}
}
