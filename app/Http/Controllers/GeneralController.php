<?php namespace App\Http\Controllers;

use App\City;
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

	public function citieslistview()
	{
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
		    return view('admin.general.addnewcity')
		        ->withErrors($validator) 
		        ->withInput($request); 
		} else {
			if((City::city_exist($request->get('cityname'))==true))
				return  view('admin.general.addnewcity')->with('fail', "Tỉnh thành này đã tồn tại!");
			else{
				$city = new City();
				$city->addcity($request->get('cityname'));
		    	return  view('admin.general.addnewcity')->with('success', "Thêm tỉnh thành thành công!");
			}
		}
	}
}
