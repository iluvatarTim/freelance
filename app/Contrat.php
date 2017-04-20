<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Contrat extends Model {

	protected $table = 'contrat';
	public $timestamps = true;

    public function findByForeignKey($p_id){
        return DB::table('contrat')->select('*')->where('project_id', $p_id)->first();
    }

}