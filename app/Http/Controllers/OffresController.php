<?php

namespace App\Http\Controllers;

use App\Models\Offres;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OffresController extends Controller
{
    //
    public function index(){
        $offres =Offres::orderby("offre_id","desc")->paginate(5);
        return view('rh.app.offre.listoffre',compact("offres"));
      }


      public function create(){
        // $classes = classe::all();
        return view('rh.app.offre.ajouteroffre' );
      }


      public function store (Request $request){

        $request->validate([
          "nom_offre"=>"required",
          "date_debut_offre"=>"required",
          "date_fin_offre"=>"required",
          "description_offre"=>"required",

        ]);






        //Etudiant ::create($request->all());

       Offres::create([
          "nom_offre"=>$request->nom_offre,
          "date_debut_offre" =>$request->date_debut_offre,
          "date_fin_offre" =>$request->date_fin_offre,
          "description_offre" =>$request->description_offre,
          "statut_offre" =>0,
          "user_id" =>Auth::user()->id,



        ]);

        return back()->with("success", "offres ajouter avec succes");

      }
      public function edit($offre_id){

        $offre = Offres::find($offre_id);
       // $classes = classe::all();
       return view('rh.app.offre.editoffre', compact("offre"));
     }


     public function update($offre_id){

        $offre = Offres::find($offre_id);
       // $classes = classe::all();
       return view('rh.app.offre.updateoffre', compact("offre"));
     }

     public function delete($offre_id){
        // $motif = $conges ->motif ." ".$conges->description;

        $offre = Offres::find($offre_id)->delete();
        // dd($offres);
        if($offre){
            return back()->with("successDelete","l'offre a ete supprimer avec succes");

        }

        return back()->with("successDelete","Erreur lors de la suppression");


      }

    }


