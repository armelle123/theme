<?php

namespace App\Http\Controllers;

use App\Models\Candidats;
use App\Models\Offres;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    // retourne la paage du site avec la liste des offres
    public function index()
    {
        $offres = Offres::all();
        return view('rh.site.offreList', compact('offres'));
    }
    public function detail($offre_id)
    {
        $offre = Offres::find($offre_id);
        // dd($offre);
        return view('rh.site.candidatcreate', compact("offre"));
    }
    public function postuler(Request $request)
    {
        $valid = $request->validate([
            "offre_id" => 'required',
            "nom_cand" => 'required',
            "prenom_cand" => 'required',
            "email_cand" => 'required|email',
            "tel_cand" => 'required',
            "cv_cand" => 'required|mimes:pdf,doc,docs|max:2048',
            "lettremotiv_cand" => 'required|mimes:pdf,doc,docs|max:2048',
            "diplome_bts_cand" => 'required|mimes:pdf,doc,docs|max:2048',
            "diplome_licence_cand" => 'mimes:pdf,doc,docs|max:2048',
            "diplome_masteur_cand" => 'mimes:pdf,doc,docs|max:2048',
        ]);

        if ($request->hasFile('cv_cand') && $request->file('cv_cand')->isValid()) {
            $fichier = $request->file('cv_cand');
            $cv_cand = time() . '.' . $fichier->getClientOriginalExtension();
            $fichier->move(public_path("candidature"), $cv_cand);
            //enregistrer les donnees dans la base de donnees
        }
        if ($request->hasFile('lettremotiv_cand') && $request->file('lettremotiv_cand')->isValid()) {
            $fichier = $request->file('lettremotiv_cand');
            $lettremotiv_cand = time() . '.' . $fichier->getClientOriginalExtension();
            $fichier->move(public_path("candidature"), $lettremotiv_cand);
            //enregistrer les donnees dans la base de donnees
        }
        $diplome_bts_cand = '';
        if ($request->hasFile('diplome_bts_cand') && $request->file('diplome_bts_cand')->isValid()) {
            $fichier = $request->file('diplome_bts_cand');
            $diplome_bts_cand = time() . '.' . $fichier->getClientOriginalExtension();
            $fichier->move(public_path("candidature"), $diplome_bts_cand);
            //enregistrer les donnees dans la base de donnees
        }
        $diplome_licence_cand = '';
        if ($request->hasFile('diplome_licence_cand') && $request->file('diplome_licence_cand')->isValid()) {
            $fichier = $request->file('diplome_licence_cand');
            $diplome_licence_cand = time() . '.' . $fichier->getClientOriginalExtension();
            $fichier->move(public_path("candidature"), $diplome_licence_cand);
            //enregistrer les donnees dans la base de donnees
        }

        $diplome_masteur_cand = '';
        if ($request->hasFile('diplome_masteur_cand') && $request->file('diplome_masteur_cand')->isValid()) {
            $fichier = $request->file('diplome_masteur_cand');
            $diplome_masteur_cand = time() . '.' . $fichier->getClientOriginalExtension();
            $fichier->move(public_path("candidature"), $diplome_masteur_cand);
            //enregistrer les donnees dans la base de donnees
        }
        $candidat = Candidats::create([
            'nom_cand' => $request->nom_cand,
            'prenom_cand' => $request->prenom_cand,
            'email_cand' => $request->email_cand,
            'tel_cand' => $request->tel_cand,
            'cv_cand' => $cv_cand,
            'lettremotiv_cand' => $lettremotiv_cand,
            'diplome_bts_cand' => $diplome_bts_cand,
            'diplome_licence_cand' => $diplome_licence_cand,
            'diplome_masteur_cand' => $diplome_masteur_cand,
            'email_confirmer_cand' => "0",
            'statuts_cand' => 0,
            'offre_id' => $request->offre_id,
        ]);
        if ($candidat) {

            return redirect('/site/offre/postuler')->with('success', 'demande creer');
        }
        return redirect('/site/offre/postuler')->with('danger', 'Une erreur s\'est produite');
    }



    public function ajouter($offre_id)
    {
        $offre = Offres::find($offre_id);
        // dd($offre);
        return view('rh.site.candidatajouter', compact("offre"));
    }
    // public function postuler (Request $request){

    //     $valitedData=$request->validate([
    //       "nom_cand" =>'required',
    //       "prenom_cand" =>'required',
    //       "email_cand" =>'required|email',
    //       "tel_cand" =>'required',
    //       "cv_cand" =>'required|mimes:pdf,doc,docs|max:2048',
    //       "lettremotiv_cand" =>'required|mimes:pdf,doc,docs|max:2048',
    //       "diplome_bts_cand" =>'required|mimes:pdf,doc,docs|max:2048',
    //       "diplome_licence_cand" =>'required|mimes:pdf,doc,docs|max:2048',
    //       "diplome_masteur_cand" =>'required|mimes:pdf,doc,docs|max:2048',
    //       "email_confirmer_cand" =>'required|email',
    //     ]);


    //             $cv_candPath =$request->file('cv_cand')->postuler('cv_cand');
    //             $lettremotiv_candPath =$request->file('lettremotiv_cand')->postuler('lettremotiv_cand');
    //             $diplome_bts_candPath=$request->file('diplome_bts_cand')->postuler('diplome_bts_cand');
    //             $diplome_licence_candPath=$request->file('diplome_licence_cand')->postuler('diplome_licence_cand');
    //             $diplome_masteur_candPath =$request->file('diplome_masteur_cand')->postuler('diplome_masteur_cand');

    //             $candidat = new Candidats();
    //             $candidat->nom_cand=$valitedData['nom_cand'];
    //             $candidat->prenom_cand=$valitedData['prenom_cand'];
    //             $candidat->email_cand=$valitedData['email_cand'];
    //             $candidat->tel_cand=$valitedData['tel_cand'];
    //             $candidat->email_confirmer_cand=$valitedData['email_confirmer_cand'];
    //             $candidat->cv_cand=$cv_candPath;
    //             $candidat->lettremotiv_cand=$lettremotiv_candPath;
    //             $candidat->diplome_bts_cand=$diplome_bts_candPath;
    //             $candidat->diplome_licence_cand=$diplome_licence_candPath;
    //             $candidat->diplome_masteur_cand=$diplome_masteur_candPath;
    //             $candidat->save();
    //             return redirect()->route('site.offre.postuler');




    //             // return redirect()->back()->with('success','votre candidature a ete envoyer avec success');


    //   }
    // public function postuler(Request $request){
    //     $candidat =$request->file('file');
    //     if($candidat != null) {  $candidatName = $candidat->getClientOriginalName();}
    //     // $fichier->move(public_path('uploads'),
    //     // $fichierName);
    //     if ($request->hasFile('cv_cand') && $request->file('cv_cand')->isValid()){
    //         $candidat = $request->file('cv_cand');

    //         if ($request->hasFile('cv_cand') && $request->file('cv_cand')->isValid()){
    //             $candidat = $request->file('cv_cand');
    //             $destinationPath = '/public/candidat';
    //         $cv_candName = time() . '.' . $candidat->getClientOriginalExtension();
    //         $nom_cand = $request->input('nom_cand');
    //         $prenom_cand = $request->input('prenom_cand');
    //         $email_cand = $request->input('email_cand');
    //         $tel_cand = $request->input('tel_cand');
    //         $email_confirmer_cand = $request->input('email_confirmer_cand');

    //         if (!empty($candidatName)&& !empty($nom_cand) &&!empty($prenom_cand) &&!empty($email_cand)&&!empty($tel_cand)&&!empty($email_confirmer_cand)&&!empty($prenom_cand)&&!empty($prenom_cand)){
    //             $candidat->move(public_path("candidat"),$candidatName);
    //             //enregistrer les donnees dans la base de donnees
    //         }

    //         // dd($request);
    //         $request->validate([

    //             "nom_cand" =>'required',
    //      "prenom_cand" =>'required',
    //      "tel_cand" =>'required',
    //      "email_cand" =>'required',
    //       "email_cand" =>'required|email',
    //        "tel_cand" =>'required',
    //        "email_confirmer_cand" =>'required|email',


    //         ]);
    //         $user= Auth::user();
    //         $candidat = new Candidats();
    //             $candidat ->nom_cand = $request->input('nom_cand');
    //             $candidat ->description_fichier = $request->input('description_fichier');
    //             $candidat ->type_fichier = $request->input('type_fichier');

    //             $candidat->user_id= $user->id;
    //             $candidat->cv_cand= $candidatName;


    //             $candidat->save();

    //             return redirect()->back()->with('succes', 'le candidat a ete bien ajouter');

    //     }

public function  enregistrer(){
    return view ('/site/offre/postuler');
}
}
