<?php namespace App\Http\Controllers\User;

use App\City;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class UserManagerController extends Controller {

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
		return view('admin.usermanager.usermanager');
	}

	public function userlistview(){
		$searched_name = '';
		$users=User::getUsers($searched_name);
		$stt=1;
		$data=compact('users','stt');
//		return view('admin.general.citieslist',$data);
		return view('admin.usermanager.userlistview', $data);
	}

}
