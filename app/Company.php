<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Company extends Model {

	protected $table = 'company';
	public $timestamps = true;
	protected $fillable = ['siret', 'denomination', 'user_id'];

	/*
	 *
	 *	class company contenant les requetes SQL permettant l'interraction avec la table company
	 *
	*/

	public function CahierDesCharges()
	{
		return $this->hasMany('App\CahierDesCharges', 'company_id');//mise en place de la relation (clef etrangère) cahier des charges a pour clef etrangère la clef primaire de la table company
	}

	public function Project()
	{
		return $this->hasMany('App\Project', 'company_id');//la table projet a pour clef etrangère la clef primaire de la table company
	}

	public function Contrat()
	{
		return $this->hasOne('App\Contrat', 'company_id');// la table contrat a pour clef etrangère la clef primaire de la table company
	}


	// recupère une société en fonction de son id utilisateur

	public function getByUserId($id){
		return DB::table('company')->select('*')->where('user_id', $id)->first();
	}


	//Met a jour l'url de la photo de profil de l'utilisateur

	public function updatePhotoUrl($id, $url){
		return DB::table('company')->where('user_id', $id)->update(['pic_url' => $url]);
	}

	// Met a jour une company en fonction de son id utilisateur

	public function upDateByUserId($userId, $siret, $denomination){
		return DB::table('company')
			->where('user_id', $userId)
			->update([
                'siret' => $siret,
                'denomination' => $denomination
			]);
	}



	//supprime une company en fonction de son id utilisateur
	public function deleteByUserId($userId){
		return DB::table('company')->where('id', $userId)->delete();
	}

}