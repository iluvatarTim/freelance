<?php 

namespace App\Http\Controllers;

use App\CahierDesCharges;
use App\Project;
use App\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProjectRequest;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller {

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

    public function listProject(){
        if(Auth::check() == true)
            $user = Auth::user();
        else
            $user = 'empty';
        $project = new Project();
        $projects = $project->findAllProjectAndCdc();
        return view('project', compact('projects', 'user'));
    }

  public function createProject(){
      if(Auth::check() == true){
          $user = Auth::user();
          if($user->role == 'company'){
              return view('espace.createProj', compact('user'));
          }
          return redirect('/')->with('error', 'accès restreint');
      }
      return redirect('login')->with('error', 'veuillez vous authentifier');
  }

   public function storeProject(){

       $cahier = new CahierDesCharges();
       $proj = new Project();
       $comp = new Company();



           if(Auth::check() == true) {
               $user = Auth::user();
               if($user->role == 'company') {
                   $Cuser = $comp->getByUserId($user->id);

                   $cahier->deadline = ProjectRequest::capture()->deadline;
                   $cahier->company_id = $Cuser->id;
                   $cahier->url_cdc = 'temp/'.$Cuser->id;

                   $cahier->save();

                   $cdc = $cahier->getCdcByUrl('temp/'.$Cuser->id);

                   $proj->title = ProjectRequest::capture()->title;
                   $proj->description = ProjectRequest::capture()->description;
                   $proj->price = ProjectRequest::capture()->price;
                   $proj->company_id = $Cuser->id;
                   $proj->cdc_id = $cdc->id;

                   $proj->save();

                   return redirect('add/cdc');

               }
               return redirect('/')->with('error', 'accès restreint');
           }
           return redirect('login')->with('error', 'veuillez vous autentifier');
       }
  
}

?>