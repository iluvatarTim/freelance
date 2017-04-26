<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/*
 *
 * class freelancer contenant les requetes permettant d'interagir avec la table freelancer
 *
 */

class Freelancer extends Model {

	protected $table = 'freelancer';
	public $timestamps = true;
	protected $fillable = ['user_id'];


	// Mise en place des clefs étrangères, les tables suivante possède pour clef étrangère la clef primaire de la table freelancer

	public function Ability()
	{
		return $this->hasMany('App\Ability', 'freelancer_id');
	}

	public function Offre()
	{
		return $this->hasMany('App\Offre', 'freelancer_id');
	}

	public function Result()
	{
		return $this->hasOne('App\Result', 'freelancer_id');
	}

	public function Contrat()
	{
		return $this->hasOne('App\Contrat', 'freelancer_id');
	}

	// fin des clefs étrangères


	//récupère un freelancer par son id utilisateur
	public function getByUserId($id){
		return DB::table('freelancer')->select('*')->where('user_id', $id)->first();
	}


	//met a jour l'url de la photo de profil du freelancer
	public function updatePhotoUrl($id, $url){
		return DB::table('freelancer')->where('user_id', $id)->update(['photo_url' => $url]);
	}

	//supprime un freelancer selon son id utilisateur
	public function deleteByUserId($userId){
		return DB::table('freelancer')->where('id', $userId)->delete();
	}

	//Met a jour l'url du cv selon son id utilisateur
	public function updateCvUrlByUserId($id, $url){
        return DB::table('freelancer')
            ->where('user_id', $id)
            ->update([
                'cv_url' => $url
            ]);
    }

	//recupère un freelancer selon son id.
    public function getById($id){
        return DB::table('freelancer')->select('*')->where('id', $id)->first();
    }

	//recupère un freelancer selon son id.
    public function findById($id){
        return DB::table('freelancer')->select('*')->where('id', $id)->first();
    }

}