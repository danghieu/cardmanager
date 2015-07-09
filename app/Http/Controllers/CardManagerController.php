<?php namespace App\Http\Controllers;

use App\Card;

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
		return view('admin.cardmanager');
	}
	public function cardslist()
	{
		$cards=Card::all();
		$stt=1;
		$data=compact('cards','stt');
		return view('admin.cardslist',$data);
	}
	public function addcardview()
	{
		return view('admin.addcardview');
	}

}
