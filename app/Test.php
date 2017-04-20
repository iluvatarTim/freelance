<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Test extends Model {

	protected $table = 'test';
	public $timestamps = true;

	public function result()
	{
		return $this->hasOne('App\Result', 'test_id');
	}

	public function findAll(){
		return DB::table('test')->select('*')->get();
	}

}