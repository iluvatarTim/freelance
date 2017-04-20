<?php 

namespace App\Http\Controllers;
use App\Admin;
use App\CahierDesCharges;
use App\Company;
use App\Freelancer;
use App\Http\Requests\ConfirmRequest;
use App\Http\Requests\GetMessageRequest;
use App\Http\Requests\ProjectRequest;
use App\Message;
use App\User;
use App\Project;
use App\Test;
use App\Http\Requests\AdminRequest;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserEditRequest;
use Illuminate\Support\Facades\Hash;
use Mockery\CountValidator\Exception;

class AdminController extends Controller {

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
      return view('admin');
  }

    public function redirect(){
        $user = Auth::user();
        if(Auth::check() == true && $user->role == 'admin')
            return view('admin.admin', compact($user));
        else if(Auth::check() == false)
            return redirect('login');
        else
            return 'Accès reservé à l\'Administrateur';
    }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(AdminRequest $request)
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
      $user->role = 'admin';

      $user->save();

      $user_id = $user->id;

      Admin::create([
          'user_id' => $user_id
      ]);
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

    public function userList(){
        $role = Auth::user();
        if(Auth::check() == true){
            if($role->role == 'admin') {
                $user = new User();
                $users = $user->findAll();
                return view('admin.users', compact('users'));
            }
            else
                return 'Accès réservé a l\'administrateur';
        }
        else
            return redirect('login');
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

    public function companyList(){
        $role = Auth::user();
        if(Auth::check() == true){
            if($role->role == 'admin'){
                $user = new User();
                $users = $user->findCompany();
                return view('admin.users', compact('users'));
            }
            else
                return 'Accès réservé a l\'administrateur';
        }
        else
            return redirect('login');
    }

    public function freelancerList(){
        $role = Auth::user();
        if(Auth::check() == true) {
            if ($role->role == 'admin') {
                $user = new User();
                $users = $user->findFreelancer();
                return view('admin.users', compact('users'));
            }
            else
                return 'Accès réservé a l\'administrateur';
        }
        else
            return redirect('login');
    }

    public function projectList(){
        $role = Auth::user();
        if(Auth::check() == true) {
            if ($role->role == 'admin') {
                $project = new Project();
                $projects = $project->findAll();
                return view('admin.project', compact('projects'));
            }
            else
                return 'Accès réservé a l\'administrateur';
        }
        else
            return redirect('login');
    }

    public function testList(){
        $role = Auth::user();
        if(Auth::check() == true) {
            if ($role->role == 'admin') {
                $test = new Test();
                $tests = $test->findAll();
                return view('admin.test', compact('tests'));
            }
            else
                return 'Accès réservé a l\'Administrateur';
        }
        return redirect('login');
    }

    public function editTest(){
        return 't\'es sur l\'edit mec';
    }

    public function editUser($id){
        $connect = Auth::user();
        if(Auth::check() == true){
            if($connect->role == 'admin'){
                $user = new User();
                $theUser = $user->findById($id);
                $usercomp = $theUser;
                if($theUser->role == 'company'){
                    $comp = new Company();
                    $usercomp = $comp->getByUserId($theUser->id);
                }
                return view('admin.editUser', compact('theUser', 'usercomp'));
            }
            return 'accès reservé à l\'administrateur';
        }
        return redirect('login');

    }

    public function postUser($id){
        $connected = Auth::user();
        if(Auth::check() == true){
            if($connected->role == 'admin'){
                $find = new User();
                $user = $find->findById($id);
                if($user->role == 'company'){
                    try{
                        $comp = new Company();
                        $comp->upDateByUserId($user->id, UserEditRequest::capture()->siret, UserEditRequest::capture()->denomination);
                    }
                    catch(Exception $ep){
                        return redirect('admin')->with('error', $ep);
                    }
                }
                try{
                    $find->upDateUserById($user->id, UserEditRequest::capture()->name, UserEditRequest::capture()->firstname, UserEditRequest::capture()->username, UserEditRequest::capture()->mail, UserEditRequest::capture()->address, UserEditRequest::capture()->phone);
                    return redirect('admin')->with('success', 'Utilisateur modifié correctement');
                }
                catch(Exception $e){
                    return redirect('admin')->with('error', $e);
                }
            }
            return 'Accès réservé à l\'administrateur';
        }
        return redirect('login');
    }

    public function deleteUser($id){
        $connected = Auth::user();
        if(Auth::check() == true){
            if($connected-> role == 'admin'){
                $find = new User();
                $user = $find->findById($id);
                //dd($user->role);
                if($user->role == 'company'){
                    $comp = new Company();
                    $comp->deleteByUserId($user->id);
                    $find->deleteById($user->id);
                }
                elseif($user->role == 'freelancer'){
                    $free = new Freelancer();
                    $free->deleteByUserId($user->id);
                    $find->deleteById($user->id);
                }
                return redirect('admin/users')->with('success', 'Utilisateur supprimé avec succès');
            }
            return redirect('perso')->with('error', 'Accès restreint');
        }
        return redirect('login')->with('error', 'Veuillez vous authentifier');
    }

    public function deleteRedirect($id){

        $user = new User();
        $id = $user->findById($id);

        return view('admin.confirm', compact('id'));
    }

    public function getEditProject($id){
        if(Auth::check() == true){
            $user = Auth::user();
            if($user->role == 'admin'){
                $project = new Project();
                $proj = $project->findProjAndCdcByProjId($id);

                return view('admin.editProj', compact('proj'));
            }
            return redirect('perso')->with('error', 'Accès restreint');
        }
        return redirect('login')->with('error', 'Veuillez vous authentifier');
    }

    public function updateProject($id){
        if(Auth::check() == true){
            $user = Auth::user();
            if($user->role == 'admin'){
                $project = new Project();
                $proj = $project->findById($id);
                $cahier = new CahierDesCharges();
                $cdc = $cahier->findById($proj->cdc_id);

                $project->updateProjectById($id, ProjectRequest::capture()->title, ProjectRequest::capture()->description, ProjectRequest::capture()->price);
                $cahier->updateDeadlineByCdcID($cdc->id, ProjectRequest::capture()->deadline);

                return redirect('admin/project')->with('success', 'Projet à bien été mis à jour');
            }
            return redirect('perso')->with('error', 'Accès restreint');
        }
        return redirect('login')->with('error', 'veuillez vous authentifier');
    }

    public function getDelProj($id){
        if(Auth::check() == true){
            $user = Auth::user();
            if($user->role == 'admin'){
                $project = new Project();
                $proj = $project->findById($id);
                return view('admin.confirmProj', compact('proj'));
            }
            return redirect('perso')->with('error', 'Accès restreint');
        }
        return redirect('login')->with('error', 'veuillez vous authentifier');
    }

    public function storeDelP($id){
        if(Auth::check() == true) {
            $user = Auth::user();
            if ($user->role == 'admin') {
                if(ConfirmRequest::capture()->confirm == 'oui') {
                    $project = new Project();
                    $cahier = new CahierDesCharges();

                    $proj = $project->findById($id);
                    $cdc = $cahier->findById($proj->cdc_id);

                    $cahier->deleteCdcById($cdc->id);
                    $project->deleteProjById($id);

                    return redirect('admin/project')->with('success', 'Projet et Cahier des charges ont bien été supprimés');
                }
                return redirect('admin/project');
            }
            return redirect('perso')->with('error', 'Accès restreint');
        }
        return redirect('login')->with('error', 'Veuillez vous authentifier');
    }

    public function getFormMessage(){
        if(Auth::check() == true){
            $user = Auth::user();
            if($user->role== 'admin'){
                $use = new User();
                $u = $use->findAll();
                $project = new Project();
                $proj = $project->findAll();

                return view('admin.formMessage', compact('u', 'proj'));
            }
            return redirect('perso')->with('error', 'accès restreint');
        }
        return redirect('login')->with('error', 'veuillez vous authentifier');
    }

    public function getMessages(){
        if(Auth::check() == true){
            $user = Auth::user();
            if($user->role == 'admin'){
                $gUser = new User();
                $project = new Project();

                $freelancer = $gUser->findComleteFreelancerByUsername(GetMessageRequest::capture()->freelancer);
                $company = $gUser->findComleteCompanyByUsername(GetMessageRequest::capture()->company);
                $proj = $project->findByTitle(GetMessageRequest::capture()->project);
                //dd($freelancer, $company, $proj);
                $message = new Message();
                $mess = $message->findMessageByUsersAndProjectId($freelancer->id, $proj->id, $company->id);
                //dd($messages);
                return view('admin.messages', compact('mess'));
            }
            return redirect('perso')->with('error', 'accès restreint');
        }
        return redirect('login')->with('error', 'veuillez vous authentifier');
    }

    public function getDelConvConfirm(){
        if(Auth::check() == true){
            $user = Auth::user();
            if($user->role == 'admin'){
                return view('admin.confirmConv');
            }
            return redirect('perso')->with('error', 'Accès restreint');
        }
        return redirect('login')->with('error', 'veuillez vous authentifier');
    }

    public function DeleteConversation($fid, $pid, $cid){
        if(Auth::check() == true) {
            $user = Auth::user();
            if ($user->role == 'admin') {
                if(ConfirmRequest::capture()->confirm == 'oui') {
                    $message = new Message();

                    $message->deleteByUsersAndProjId($fid, $pid, $cid);

                    return redirect('admin/conv')->with('success', 'Projet et Cahier des charges ont bien été supprimés');
                }
                return redirect('admin/conv');
            }
            return redirect('perso')->with('error', 'Accès restreint');
        }
        return redirect('login')->with('error', 'Veuillez vous authentifier');
    }
}

?>