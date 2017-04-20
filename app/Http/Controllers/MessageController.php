<?php 

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Message;
use App\Offre;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller {

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

    public function messageList(){
        $message = new Message();
        $messages = $message->findMessageAndProject();
        return view('message', compact('messages'));
    }

    public function discussFreeComp($f_id, $p_id, $c_id){
        if(Auth::check() == true){
            $user = Auth::user();
            $mess = new Message();
            $messages = $mess->findMessageByUsersAndProjectId($f_id, $p_id, $c_id);
            $offres = new Offre();
            $offre = $offres->findByFreeAndProjId($f_id, $p_id);
            return view('espace.message', compact('messages', 'user', 'offre'));
        }
        return redirect('login')->with('error', 'veuillez vous authentifier');
    }

    public function messagePost($u_id, $f_id, $p_id, $c_id){
        if(Auth::check() == true){
            $user = Auth::user();
            if($user->id == $u_id){

                $message = new Message();
                $message->firstname = MessageRequest::capture()->firstname;
                $message->name = MessageRequest::capture()->name;
                $message->mail = MessageRequest::capture()->mail;
                $message->type = 'private';
                $message->content = MessageRequest::capture()->message;
                $message->freelancer_id = $f_id;
                $message->project_id = $p_id;
                $message->comp_id = $c_id;
                $message->user_id = $user->id;
                $message->save();
                return redirect('message/'.$f_id.'/'.$p_id.'/'.$c_id)->with('success', 'votremessage a bien été enregistré');
            }
            return redirect('perso')->with('error', 'accès restreint');
        }
        return redirect('login')->with('error', 'veuillez vous authentifier');
    }
  
}

?>