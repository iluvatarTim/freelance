<?php 

namespace App\Http\Controllers;

use App\Contrat;
use App\Http\Requests\CvRequest;
use App\Http\Requests\PostuleRequest;
use App\Message;
use App\Offre;
use App\Http\Requests\FreelanceRequest;
use App\Project;
use Illuminate\Foundation\Auth\User as AuthUser;
use App\Freelancer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FreelancerController extends Controller {

    protected $redirectTo = 'login';

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
    return view('freelancer');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(FreelanceRequest $request)
  {
      $adresse = $request->input('adresse').' '.$request->input('postal').' '.$request->input('ville');

      $password = Hash::make($request->input('secret'));

      $user = new AuthUser();

      $user->name = $request->input('nom');
      $user->firstname = $request->input('prenom');
      $user->username = $request->input('username');
      $user->mail = $request->input('mail');
      $user->password = $password;
      $user->address = $adresse;
      $user->phone = $request->input('phone');
      $user->role = 'freelancer';
      $user->remember_token = 'toto';

      $user->save();

      $user_id = $user->id;

      $freelancer = new Freelancer();

      $freelancer->user_id = $user_id;
      $freelancer->photo_url = 'uploads/default.jpg';

      $freelancer->save();

    return redirect($this->redirectTo);
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

    public function checkPostule($cdc_id, $f_id){
        $project = new Project();
        $proj = $project->findByCdcId($cdc_id);
        $offre = new Offre();
        $o = $offre->findByFreeAndProjId($f_id, $proj->id);
        if($o != '')
            return true;
        return false;

    }

    public function checkContrat($cdc_id){
        $project = new Project();
        $proj = $project->findByCdcId($cdc_id);
        $contrat = new Contrat();
        $ctrt = $contrat->findByForeignKey($proj->id);
        if($ctrt != '')
            return true;
        return false;
    }

    public function redirectPostul($id){
        if(Auth::check() == true){
            $user = Auth::user();
            if($user->role == 'freelancer'){
                $free = new Freelancer();
                $f = $free->getByUserId($user->id);
                if($this->checkPostule($id, $f->id) == false){
                    if($this->checkContrat($id) == false)
                        return view('postule', compact('user', 'id'));
                    return redirect('project')->with('error', 'Un contrat est déjà établie sur cette offre');
                }
                return redirect('project')->with('error', 'Vous avez déjà postulé à  cette offre');
            }
        }
        return redirect('login')->with('error', 'veuillez vous authentifier');
    }

    public function storePostul($id){
        if(Auth::check() == true){
            $user = Auth::user();
            if($user->role == 'freelancer'){

                $free = new Freelancer();

                $freelancer = $free->getByUserId($user->id);

                $offre = new Offre();
                $proj = new Project();

                $project = $proj->findByCdcId($id);

                $offre->message = PostuleRequest::capture()->message;
                $offre->freelancer_id = $freelancer->id;
                $offre->project_id = $project->id;

                $offre->save();

                $message = new Message();

                $message->firstname = $user->firstname;
                $message->name = $user->name;
                $message->mail = $user->mail;
                $message->type = 'private';
                $message->content = PostuleRequest::capture()->message;
                $message->freelancer_id = $freelancer->id;
                $message->project_id = $project->id;
                $message->comp_id = $project->company_id;
                $message->user_id = $user->id;

                $message->save();

                return redirect('project')->with('success', 'Vous avez postulé l\'offre');
            }
        }
        return redirect('login')->with('error', 'Veuillez vous authentitifer');
    }

    public function getCv(){
        if(Auth::check() == true){
            $user = Auth::user();
            if($user->role == 'freelancer'){
                return view('espace.addCv', compact('user'));
            }
            return redirect('/')->with('error', 'Accès restreint');
        }
        return redirect('login')->with('error', 'veuillez vous authentifier');
    }

    public function addCv(){
        if(Auth::check() == true){
            $user = Auth::user();
            $free = new Freelancer();
            if($user->role == 'freelancer'){
                $cv = CvRequest::capture()->file('cv');
                if($cv->isValid()){
                    $chemin = config('cv.path');
                    $extension = $cv->getClientOriginalExtension();
                    do{
                        $nom = str_random(10).'.'.$extension;
                    }while(file_exists($chemin.'/'.$nom));
                    $url = $chemin.'/'.$nom;

                    $free->updateCvUrlByUserId($user->id, $url);
                    if($cv->move($chemin, $nom)){
                        return redirect('perso')->with('success', 'Votre CV est bien enregistré');
                    }


                }
            }
        }
    }
  
}

?>