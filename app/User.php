<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Contracts\Auth\Authenticatable;

class User extends Model implements Authenticatable{

    use AuthenticableTrait;

	protected $table = 'users';
	public $timestamps = true;
	protected $fillable = ['name', 'firstname', 'username', 'mail', 'password', 'address', 'phone', 'role'];

	public function Admin()
	{
		return $this->hasMany('App\Admin', 'user_id');
	}

	public function Freelancer()
	{
		return $this->hasMany('App\Freelancer', 'user_id');
	}

	public function Company()
	{
		return $this->hasMany('App\Company', 'user_id');
	}

	public function Message()
	{
		return $this->hasMany('App\Message', 'user_id');
	}

	public static function getUserLogin($username, $password){
		return DB::table('users')->select('*')->where('username', $username)->where('password', $password)->first();
	}

    public function findAll(){
        return DB::table('users')->select('*')->distinct()->get();
    }

    public function findFreelancer(){
        return DB::table('users')->select('*')->where('role', 'freelancer')->get();
    }

    public function findCompany(){
        return DB::table('users')->select('*')->where('role', 'company')->get();
    }

	public function findById($id){
		return DB::table('users')->select('*')->where('id', $id)->first();
	}

    public function upDateUserById($id, $name, $firstname, $username, $mail, $address, $phone){
        return DB::table('users')
            ->where('id', $id)
            ->update([
                'name' => $name,
                'username' => $username,
                'firstname' => $firstname,
                'mail' => $mail,
                'address' => $address,
                'phone' => $phone,
            ]);
    }

	public function deleteById($id){
		return DB::table('users')->where('id', $id)->delete();
	}

	public function findComleteFreelancerByUsername($username){
		return DB::table('users')
			->join('freelancer', 'users.id', '=', 'freelancer.user_id')
			->select('*')
            ->where('users.username', $username)
            ->first();
    }

    public function findComleteCompanyByUsername($username){
        return DB::table('users')
            ->join('company', 'users.id', '=', 'company.user_id')
            ->select('*')
            ->where('users.username', $username)
            ->first();
    }

}