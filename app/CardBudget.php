<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class CardBudget extends Model {


	protected $table = 'Card_Budget';

	public function Card()
    {
        return $this->hasOne('App\Card', 'card_budget');
    }
}
