<?php 

namespace App\Http\Controllers;

use App\CahierDesCharges;
use App\Http\Requests\ProjectRequest;
use App\Company;
use Illuminate\Support\Facades\Auth;

class CahierDesChargesController extends Controller {

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

  public function addCdc()
  {

      if (Auth::check() == true) {
          $user = Auth::user();
          if ($user->role == 'company') {
              $comp = new Company();
              $Cuser = $comp->getByUserId($user->id);
              $pdf = ProjectRequest::capture()->file('pdf');

              if ($pdf->isValid()) {

                  $path = config('pdf.path');
                  $extension = $pdf->getClientOriginalExtension();

                  do {
                      $name = str_random(10) . '.' . $extension;
                  } while (file_exists($path . '/' . $name));

                  $url = $path . '/' . $name;

                  //return redirect('proj/store')->with('url', $url);

                  if ($pdf->move($path, $name)) {
                      $cdc = new CahierDesCharges();
                      $cdc->UpdateUrlCdc('temp/'.$Cuser->id, $url);

                      return redirect('perso')->with('success', 'projet et cahier des charges enregistrés avec succès');
                  }
              }
          }
          return redirect('/')->with('error', 'Accès restreint');
      }
      return redirect('login')->with('error', 'veuillez vous authebtifier');
  }

    public function formCdc(){
        if(Auth::check()){
            $user = Auth::user();
            if($user->role == 'company')
                return view('espace.addCdc', compact('user'));
            return redirect('/')->with('error', 'accès restreint');
        }
        return redirect('login')->with('error', 'veuillez vous authentifier');
    }

  
}

?>