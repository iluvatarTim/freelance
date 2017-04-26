<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ability extends Model {

	protected $table = 'ability';
	public $timestamps = true;

	public function Test()
	{
		return $this->hasMany('App\Test', 'ability_id');//création relation bdd test possède une clef étrangère ability_id qui vient de la table ability
	}

}