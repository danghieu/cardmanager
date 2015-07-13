<?php namespace App\Http\Controllers;

use App\City;
use App\Http\Requests;
use App\Http\Controllers\Controller;

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

}
