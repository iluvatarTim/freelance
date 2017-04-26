<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model {
	/*
	 *
	 * class Model, classe mère dont hérite toutes les classes du model
	 *
	*/

	protected $table = 'admin';
	public $timestamps = true;
	protected $fillable = ['user_id'];

}