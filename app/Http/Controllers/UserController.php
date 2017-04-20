<?php 

namespace App\Http\Controllers;

use App\Offre;
use App\Project;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ImagesRequest;
use App\Company;
use App\Freelancer;
use App\Http\Requests\UpDateRequest;
use Illuminate\Support\Facades\DB;

class UserController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store()
  {
    
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    
  }

    public function getPic(){
        $user = Auth::user();
        if(Auth::check() == true && $user->role != 'admin')
            return view('espace.pic', compact('user'));
    }

    public function postPic(ImagesRequest $request){
        $user = Auth::user();
        if(Auth::check() == true){
            $image = $request->file('image');
            //dd($image);

            if($image->isValid()){
                $chemin = config('images.path');
                $extension = $image->getClientOriginalExtension();
                do{
                    $nom = str_random(10).'.'.$extension;
                }while(file_exists($chemin.'/'.$nom));

                $url = $chemin.'/'.$nom;

                if($user->role == 'freelancer'){
                    $free = new Freelancer();
                    $urlphotofree = $free->updatePhotoUrl($user->id, $url);
                }

                elseif($user->role == 'company'){
                    $comp = new Company();
                    $urlpc = $comp->updatePhotoUrl($user->id, $url);
                }


                if($image->move($chemin, $nom)){
                    session([
                        'photo_url' => $url
                    ]);
                    return redirect('perso')->with('success', 'Votre photo à bien été enregistrée');
                }
                else
                    return 'Erreur lors de l\'envoie de la photo';
            }
            return redirect('perso/pics')->with('error', 'Désolé mais votre image n\'est pas valide');
        }
        return redirect('login')->with('error', 'veuillez vous authentifier');
    }

    public function getInfo(){
        if(Auth::check() == true){
            $user = Auth::user();
            if($user->role != 'admin'){
                if($user->role == 'company'){
                    $company = new Company();
                    $userCompany = $company->getByUserId($user->id);
                }
                return view('espace.info', compact('user', 'userCompany'));
            }
            return 'Non accessible a l\'administrateur';
        }
        return redirect('login');
    }

    public function postInfo($id){
        $find = new User();
        if(Auth::check() == true){
            $user  = Auth::user();
            if($user->role == 'admin'){
                $theUser = $find->findById($id);
                if($theUser->role == 'company'){
                    $comp = new Company();
                    $comp->upDateByUserId($id, UpDateRequest::capture()->siret, UpDateRequest::capture()->deno);
                }
                $find->upDateUserById($id, UpDateRequest::capture()->name, UpDateRequest::capture()->firstname, UpDateRequest::capture()->username, UpDateRequest::capture()->mail, UpDateRequest::capture()->address, UpDateRequest::capture()->phone);
            }
            return 'Accessible uniquement par un administrateur';
        }
        return redirect('login');
    }

    public function listProject(){
        if(Auth::check() == true){
            $user = Auth::user();
            $comp = new Company();
            $user_comp = $comp->getByUserId($user->id);
            if($user->role == 'company'){
                $proj = new Project();
                $projects = $proj->findByCompanyId($user_comp->id);
                return view('espace.myProj', compact('projects', 'user'));
            }
            elseif($user->role == 'freelancer'){
                return view('espace.listproj');
            }
            else
                return redirect('admin');
        }
        return redirect('login');
    }

    public function getFreelancerProfile($id){
        if(Auth::check() == true){
            $user = Auth::user();
            if($user->role ==  'company'){
                $free = new Freelancer();
                $uFree = $free->getById($id);
                $u = new User();
                $info = $u->findById($uFree->user_id);
                return view('espace.profile', compact('info', 'uFree', 'user'));
            }
            return redirect('perso')->with('error', 'accès restreint');
        }
        return redirect('login')->with('error', 'veuillez vous authentifier');
    }

    public function getOffre($id){
        if(Auth::check() == true){
            $user = Auth::user();
            if($user->role == 'company'){

                $offre = new Offre();
                $offres = $offre->findProjAndOffreByProjId($id);
                $company = new Company();
                $comp = $company->getByUserId($user->id);

                return view('espace.offres', compact('user', 'offres', 'comp'));
            }
            return  redirect('perso')->with('error', 'Accès restreint');
        }
        return redirect('login')->with('error', 'veuillez vous authentifier');
    }
}

?>