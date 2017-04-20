<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Offre extends Model {

	protected $table = 'offre';
	public $timestamps = true;

	public function Contrat()
	{
		return $this->hasOne('App\Contrat', 'offre_id');
	}

	public function findAll(){
        return DB::table('offre')
            ->select('*')->distinct()->get();
	}

    public function findByFreelancerId($id){
        return DB::table('offre')->select('*')->where('freelancer_id', $id);
    }

    public function findMyOfferById($id){
        return DB::table('offre')
            ->join('project', 'offre.project_id', '=', 'project.id')
            ->join('cdc', 'cdc.id', '=', 'project.cdc_id')
            ->join('freelancer', 'offre.freelancer_id', '=', 'freelancer.id')
            ->select('offre.*', 'project.*', 'cdc.*', 'freelancer.*')
            ->where('offre.freelancer_id', $id)
            ->get();
    }

	public function UpdateOffre($id, $message){
		return DB::table('offre')
			->xhere('id', $id)
			->update([
				'message' => $message
			]);
	}

    public function findByFreeAndProjId($f_id, $p_id){
        return DB::table('offre')
            ->select('*')
            ->where('freelancer_id', $f_id)
            ->where('project_id', $p_id)
            ->first();
    }

    public function findById($id){
        return DB::table('offre')->select('*')->where('id', $id)->first();
    }

    public function findByProjId($id){
        return DB::table('offre')->select('*')->where('project_id', $id)->get();
    }

    public function findProjAndOffreByProjId($id){
        return DB::table('offre')
            ->join('project', 'offre.project_id', '=', 'project.id')
            ->join('freelancer', 'offre.freelancer_id', '=', 'freelancer.id')
            ->join('users', 'freelancer.user_id', '=', 'users.id')
            ->select('project.title', 'project.company_id', 'offre.*', 'users.name', 'users.firstname')
            ->where('offre.project_id', $id)
            ->get();
    }

}