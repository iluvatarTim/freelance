<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class CahierDesCharges extends Model {

	protected $table = 'cdc';
	public $timestamps = true;

	public function Project()
	{
		return $this->hasOne('App\Project', 'cdc_id');
	}

	public function UpdateUrlCdcById($url, $id){
		return DB::table('cdc')
			->where('id', $id)
			->update([
				'url_cdc' => $url
			]);
	}

	public function getCdcByUrl($url){
		return DB::table('cdc')->select('id')->where('url_cdc', $url)->first();
	}

	public function UpdateUrlCdc($oldurl, $url){
        return DB::table('cdc')
            ->where('url_cdc', $oldurl)
            ->update([
                'url_cdc' => $url
            ]);
    }

    public function updateDeadlineByCdcID($id, $deadline){
        return DB::table('cdc')
            ->where('id', $id)
            ->update([
                'deadline' => $deadline
            ]);
    }

    public function findById($id){
        return DB::table('cdc')->select('*')->where('id', $id)->first();
    }

    public function deleteCdcById($id){
        return DB::table('cdc')->where('id', $id)->delete();
    }

}