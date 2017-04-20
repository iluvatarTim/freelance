<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Message extends Model {
	protected $table = 'message';
	public $timestamps = true;

    public function findMessageAndProject(){
        return DB::table('message')
            ->join('project', 'message.project_id', '=', 'project.id')
            ->select('message.*', 'project.*')
            ->distinct()
            ->get();
    }

    public function findMessageByUsersAndProjectId($f_id, $p_id, $c_id){
        return DB::table('message')
            ->join('freelancer', 'message.freelancer_id', '=', 'freelancer.id')
            ->join('company', 'message.comp_id', '=', 'company.id')
            ->join('users', 'message.user_id', '=', 'users.id')
            ->select('*')
            ->where('freelancer_id', $f_id)
            ->where('project_id', $p_id)
            ->where('comp_id', $c_id)
            ->get();
    }

    public function deleteByUsersAndProjId($fid, $pid, $cid){
        return DB::table('message')
            ->where('freelancer_id', $fid)
            ->where('project_id', $pid)
            ->where('comp_id', $cid)
            ->delete();
    }
}