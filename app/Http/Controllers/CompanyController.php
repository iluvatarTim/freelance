<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CompanyRequest;
use App\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use App\Company;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class CompanyController extends Controller {

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
    return view('company');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(CompanyRequest $request)
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
      $user->role = 'company';
      $user->remember_token = 'toto';

      $user->save();

      $user_id = $user->id;

      $company = new Company();

      $company->siret = $request->input('siret');
      $company->denomination = $request->input('denomination');
      $company->pic_url = 'uploads/default.jpg';
      $company->user_id = $user_id;

      $company->save();
      return redirect('login');

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
  
}

?>