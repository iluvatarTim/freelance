<?php

namespace App\Http\Controllers;

use App\CahierDesCharges;
use App\Http\Requests\PDFRequest;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function postPic(PDFRequest $request){
        $user = Auth::user();
        if(Auth::check() == true){
            $pdf = $request->file('pdf');

            if($pdf->isValid()){
                $chemin = config('pdf.path');
                $extension = $pdf->getClientOriginalExtension();
                do{
                    $nom = str_random(10).'.'.$extension;
                }while(file_exists($chemin.'/'.$nom));

                $url = $chemin.'/'.$nom;

                if($user->role == 'freelancer'){
                    $free = new Freelancer();
                    $urlphotofree = $free->updatePhotoUrl($user->id, $url);
                }

                elseif($user->role == 'company'){
                    $cdc = new CahierDesCharges();
                    //$comp = new Company();
                    $urlcdc = 'toto';
                    //$urlpc = $comp->updatePhotoUrl($user->id, $url);
                }


                if($pdf->move($chemin, $nom)){
                    session([
                        'pdf_url' => $url
                    ]);
                    return redirect('perso')->with('success', 'Votre cahier des charges à bien été enregistrée');
                }
                else
                    return 'Erreur lors de l\'envoie du cahier des charges';
            }
            return redirect('perso/cdc')->with('error', 'Désolé mais votre cahier des charges n\'est pas valide');
        }
        return redirect('login')->with('error', 'veuillez vous authentifier');
    }
}
