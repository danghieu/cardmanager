<?php namespace App\Http\Controllers;

use App\Card;
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
		return view('admin.cardmanager');
	}
	public function cardslistview()
	{
		return view('admin.cardslistview');
	}
	public function cardslist(Request $request)
	{
		$type =$request->get('type');
		if(!is_numeric($request->get('type')))
			$cards=Card::all();
		else $cards=Card::getCardsList($type);

		$stt=1;
		$data=compact('cards','stt');
		return view('admin.cardslist',$data);
	}
	public function addcardview()
	{
		return view('admin.addcardview');
	}

	public function addcard(Request $request)
	{
		$rules = array(
		    'cardnumber'    => 'required|min:10|max:10'
		);

		$validator = Validator::make($request->all(), $rules);

		if ($validator->fails()) {
		    return view('admin.addcardview')
		        ->withErrors($validator) 
		        ->withInput($request); 
		} else {
			if((Card::cardnumber_exist($request->get('cardnumber'))=="true"))
				return  view('admin.addcardview')->with('fail', "Thẻ này đã tồn tại!");
			else{
				$card = new Card();
				$card->createcard($request->get('cardnumber'));
		    	return  view('admin.addcardview')->with('success', "Thêm Thẻ thành công!");
			}
		}
	}

}
