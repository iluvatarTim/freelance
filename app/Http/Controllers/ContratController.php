<?php 

namespace App\Http\Controllers;

use App\Company;
use App\Contrat;
use App\Freelancer;
use App\Http\Requests\ProjectRequest;
use App\Offre;
use App\Project;
use Illuminate\Support\Facades\Auth;

class ContratController extends Controller {

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

    public function getContrat($f_id, $o_id, $u_id){
        if(Auth::check() == true){
            $user = Auth::user();
            if($user->id == $u_id && $user->role == 'company'){
                $comp = new Company();
                $cUser = $comp->getByUserId($u_id);
                $free = new Freelancer();
                $fUser = $free->findById($f_id);
                $offres = new Offre();
                $offre = $offres->findById($o_id);
                $project = new Project();
                $proj = $project->findById($offre->project_id);
                return view('espace.contrat', compact('user', 'cUser', 'fUser', 'offre', 'proj'));
            }
            return redirect('perso')->with('error', 'accès restreint');
        }
        return redirect('login')->with('error', 'veuillez vous authentifier');
    }

    public function storeContrat($f, $o, $c, $p){
        if(Auth::check() == true){
            $user = Auth::user();
            if($user->role == 'company'){
                $contrat = new Contrat();
                $ctrtpdf = ProjectRequest::capture()->file('pdf');

                if ($ctrtpdf->isValid()) {

                    $path = config('contrat.path');
                    $extension = $ctrtpdf->getClientOriginalExtension();

                    do {
                        $name = str_random(10) . '.' . $extension;
                    } while (file_exists($path . '/' . $name));

                    $url = $path . '/' . $name;

                    //return redirect('proj/store')->with('url', $url);

                    if ($ctrtpdf->move($path, $name)) {
                        $contrat->url_contrat = $url;
                        $contrat->freelancer_id = $f;
                        $contrat->company_id = $c;
                        $contrat->offre_id = $o;
                        $contrat->project_id = $p;
                        $contrat->save();

                        return redirect('perso')->with('success', 'Le contrat a été enregistré avec succès');
                    }
                }


            }
            return redirect('perso')->with('error', 'accès restreint');
        }
        return redirect('login')->with('error', 'veuillez vous authentifier');
    }
  
}

?>