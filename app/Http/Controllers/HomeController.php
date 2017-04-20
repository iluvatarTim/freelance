<?php

namespace App\Http\Controllers;

use App\Freelancer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function persoRedirect(){
        $user = Auth::user();
        if(Auth::check() == true){
            if($user->role == 'admin')
                return redirect('admin');
            else{
                $typeUser = null;
                if($user->role == 'freelancer'){
                    $free = new Freelancer();
                    $fUser = $free->getByUserId($user->id);
                    if($fUser->cv_url != '')
                        $typeUser = $fUser;

                }
                return view('espace.perso', compact('user', 'typeUser'));
            }
        }
        else
            return redirect('login');
    }
}
