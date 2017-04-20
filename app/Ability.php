<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ability extends Model {

	protected $table = 'ability';
	public $timestamps = true;

	public function Test()
	{
		return $this->hasMany('App\Test', 'ability_id');
	}

}