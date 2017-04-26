<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/*
 *
 * Class contrat contenant les requêtes SQL permettant d'interarige avec la table contrat.
 *
 */

class Contrat extends Model {

	protected $table = 'contrat';
	public $timestamps = true;




    //trouve un contrat en fonction de la clef etrangère project_id.
    public function findByForeignKey($p_id){
        return DB::table('contrat')->select('*')->where('project_id', $p_id)->first();
    }

}