<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Project extends Model {

	protected $table = 'project';
	public $timestamps = true;

	public function Offre()
	{
		return $this->hasMany('App\Offre', 'project_id');
	}

    public function Message(){
        return $this->hasMany('App\Message', 'project_id');
    }

	public function findAll(){
		return DB::table('project')
            ->join('cdc', 'project.cdc_id', '=', 'cdc.id')
            ->select('project.*', 'cdc.url_cdc', 'cdc.deadline')
            ->get();
	}

	public function findByCompanyId($id){
		return DB::table('project')
            ->join('cdc', 'project.cdc_id', '=', 'cdc.id')
            ->select('project.*', 'cdc.url_cdc', 'cdc.deadline')
            ->where('project.company_id', $id)
            ->get();
	}

	public function findAllProjectAndCdc(){
        return DB::table('project')
            ->join('cdc', 'cdc.id', '=', 'project.cdc_id')
            ->select('project.*', 'cdc.*')
            ->distinct()
            ->get();
    }

	public function findByCdcId($id){
		return DB::table('project')->select('*')->where('cdc_id', $id)->first();
	}

    public function findById($id){
        return DB::table('project')->select('*')->where('id', $id)->first();
    }

    public function findProjAndCdcByProjId($id){
        return DB::table('project')
            ->join('cdc', 'project.cdc_id', '=', 'cdc.id')
            ->select('project.*', 'cdc.url_cdc', 'cdc.deadline')
            ->where('project.id', $id)
            ->first();
    }

    public function updateProjectById($id, $title, $description, $price){
        return DB::table('project')
            ->where('id', $id)
            ->update([
                'title' => $title,
                'description' => $description,
                'price' => $price
            ]);
    }

    public function deleteProjById($id){
        return DB::table('project')->where('id', $id)->delete();
    }

    public function findByTitle($title){
        return DB::table('project')->select('*')->where('title', $title)->first();
    }

}