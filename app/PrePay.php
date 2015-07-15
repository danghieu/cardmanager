<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class PrePay extends Model {


	protected $table = 'Prepay';

	public function Card()
    {
        return $this->belongsTo('App\Card', 'card');
    }
}
