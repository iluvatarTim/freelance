<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Freelancer extends Model {

	protected $table = 'freelancer';
	public $timestamps = true;
	protected $fillable = ['user_id'];

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

	public function getByUserId($id){
		return DB::table('freelancer')->select('*')->where('user_id', $id)->first();
	}

	public function updatePhotoUrl($id, $url){
		return DB::table('freelancer')->where('user_id', $id)->update(['photo_url' => $url]);
	}

	public function deleteByUserId($userId){
		return DB::table('freelancer')->where('id', $userId)->delete();
	}

	public function updateCvUrlByUserId($id, $url){
        return DB::table('freelancer')
            ->where('user_id', $id)
            ->update([
                'cv_url' => $url
            ]);
    }

    public function getById($id){
        return DB::table('freelancer')->select('*')->where('id', $id)->first();
    }

    public function findById($id){
        return DB::table('freelancer')->select('*')->where('id', $id)->first();
    }

}