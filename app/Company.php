<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Company extends Model {

	protected $table = 'company';
	public $timestamps = true;
	protected $fillable = ['siret', 'denomination', 'user_id'];

	public function CahierDesCharges()
	{
		return $this->hasMany('App\CahierDesCharges', 'company_id');
	}

	public function Project()
	{
		return $this->hasMany('App\Project', 'company_id');
	}

	public function Contrat()
	{
		return $this->hasOne('App\Contrat', 'company_id');
	}

	public function getByUserId($id){
		return DB::table('company')->select('*')->where('user_id', $id)->first();
	}

	public function updatePhotoUrl($id, $url){
		return DB::table('company')->where('user_id', $id)->update(['pic_url' => $url]);
	}

	public function upDateByUserId($userId, $siret, $denomination){
		return DB::table('company')
			->where('user_id', $userId)
			->update([
                'siret' => $siret,
                'denomination' => $denomination
			]);
	}

	public function deleteByUserId($userId){
		return DB::table('company')->where('id', $userId)->delete();
	}

}