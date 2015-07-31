<?php namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Redirector;
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

}
