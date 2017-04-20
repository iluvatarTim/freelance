<?php 

namespace App\Http\Controllers;

use App\Freelancer;
use App\Offre;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OffreController extends Controller {

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
    public function listMyOffre(){
        if(Auth::check() == true){
            $user = Auth::user();
            if($user->role == 'freelancer'){
                $free = new Freelancer();
                $user_free = $free->getByUserId($user->id);
                $offre = new Offre();
                $offres = $offre->findMyOfferById($user_free->id);
                return view('espace.myOffer', compact('offres', 'user'));
            }
            return 'Access denied';
        }
        return redirect('login');
    }
  
}

?>