<?php

namespace App\Http\Controllers;

use App\Models\Candidats;
use App\Models\Offres;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    // retourne la paage du site avec la liste des offres
    public function index()
    {
        $offres =Offres::all();
        return view('rh.site.offreList',compact('offres'));

    }
    public function detail($offre_id){
        $offre =Offres::find($offre_id);
        // dd($offre);
        return view('rh.site.candidatcreate',compact("offre"));

    }
    public function postuler (Request $request){

        $request->validate([
          "nom_cand" =>'required',
          "prenom_cand" =>'required',
          "email_cand" =>'required|email',
          "tel_cand" =>'required',
          "cv_cand" =>'required|mimes:pdf,doc,docs|max:2048',
          "lettremotiv_cand" =>'required|mimes:pdf,doc,docs|max:2048',

          "diplome_bts_cand" =>'required|mimes:pdf,doc,docs|max:2048',
          "diplome_licence_cand" =>'required|mimes:pdf,doc,docs|max:2048',
          "diplome_masteur_cand" =>'required|mimes:pdf,doc,docs|max:2048',

          "email_confirmer_cand" =>'required|email',
        ]);
        $candidat = new Candidats;
                 $candidat->offre_id = $request->input('offre_id');
                $candidat->nom_cand = $request->input('nom_cand');
                $candidat->prenom_cand = $request->input('prenom_cand');
                $candidat->email_cand = $request->input('email_cand');
                $candidat->tel_cand = $request->input('tel_cand');

                $candidat->email_confirmer_cand = $request->input('email_confirmer_cand');

                $cv_cand =$request->file('cv_cand');
                $cv_candPath = $cv_cand->store('cv_cand','public');
                $candidat->cv_cand =$cv_candPath;

                $lettremotiv_cand =$request->file('cv_cand');
                $lettremotiv_candPath = $lettremotiv_cand->store('lettremotiv_cand','public');
                $candidat->lettremotiv_cand =$lettremotiv_candPath;

                $diplome_bts_cand =$request->file('diplome_bts_cand');
                $diplome_bts_candPath = $diplome_bts_cand->store('diplome_bts_cand','public');
                $candidat->diplome_bts_cand =$diplome_bts_candPath;

                $diplome_licence_cand =$request->file('diplome_licence_cand');
                $diplome_licence_candPath = $diplome_licence_cand->store('diplome_licence_cand','public');
                $candidat->diplome_licence_cand =$diplome_licence_candPath;

                $diplome_masteur_cand =$request->file('diplome_masteur_cand');
                $diplome_masteur_candPath = $diplome_masteur_cand->store('diplome_masteur_cand','public');
                $candidat->diplome_masteur_cand =$diplome_masteur_candPath;

                return redirect()->back()->with('success','votre candidature a ete envoyer avec success');


      }


      public function ajouter($offre_id){
        $offre =Offres::find($offre_id);
        // dd($offre);
        return view('rh.site.candidatajouter',compact("offre"));

    }

}
