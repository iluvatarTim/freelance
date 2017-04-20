<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
//use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Company;
use App\Freelancer;

use App\Http\Requests\LoginRequest;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    //use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';
    protected $user;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest', ['except' => 'logout']);
    }

    public function redirect(){
        return view('auth.login');
    }

    public function login(LoginRequest $logrequest){
        $password = $logrequest->input('password');
        $username = $logrequest->input('username');

        Auth::attempt(['username' => $username, 'password' => $password]);

        if(Auth::check() == true){
            $user = Auth::user();
            session([
                'role' => $user->role
            ]);
            if($user->role == 'company'){
                $company = new Company();
                $userCompany = $company->getByUserId($user->id);

                if(!empty($userCompany->pic_url))
                    session(['photo_url' => $userCompany->pic_url]);
                else
                    session(['photo_url' => 'uploads/default.jpg']);
            }
            elseif($user->role == 'freelancer'){
                $freelancer = new Freelancer();
                $userFreelancer = $freelancer->getByUserId($user->id);
                if(!empty($userFreelancer->photo_url))
                    session(['photo_url' => $userFreelancer->photo_url]);
                else
                    session(['photo_url' => 'uploads/default.jpg']);
            }
            if($user->role == 'admin')
                return redirect('admin');

            return redirect('perso');
        }
        return redirect('login')->with('error', 'mot de passe ou identifiant incorrect');
    }

    public function logout(){
        Auth::logout();
        return redirect($this->redirectTo);
    }
}
