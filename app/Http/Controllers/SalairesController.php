<?php

namespace App\Http\Controllers;

use App\Models\Salaires;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalairesController extends Controller
{
    //
    public function index(){
        $salaires =Salaires::orderby("salaire_id","desc")->paginate(5);
        return view('rh.app.paie.listpaie',compact("salaires"));
      }


      public function create(){
        // $classes = classe::all();
        return view('rh.app.paie.ajouterpaie' );
      }


      public function store (Request $request){

        $request->validate([
          "nature_salaire"=>"required",
          "date_salaire"=>"required",
          "periode_salaire"=>"required",
          "bonus_salaire"=>"required",
          "avance_salaire"=>"required",

        ]);
             //Etudiant ::create($request->all());

      Salaires::create([
        "nature_salaire"=>$request->nature_salaire,
        "montant_salaire" =>$request->montant_salaire,
        "date_salaire" =>$request->date_salaire,
        "periode_salaire" =>$request->periode_salaire,
        "bonus_salaire" =>$request->bonus_salaire,
        "avance_salaire" =>$request->avance_salaire,
        "user_id" =>Auth::user()->id,


      ]);

      return back()->with("success", "salaires ajouter avec succes");
    }


    public function edit($salaire_id){

        $salaire = Salaires::find($salaire_id);
       // $classes = classe::all();
       return view('rh.app.paie.editpaie',compact("salaire"));
     }





     public function update($salaire_id){

        $salaire = Salaires::find($salaire_id);
       // $classes = classe::all();
       return view('rh.app.paie.updatepaie',compact("salaire"));
     }

     public function delete($salaire_id){
        // $motif = $conges ->motif ." ".$conges->description;

        $salaire = Salaires::find($salaire_id)->delete();
        // dd($offres);
        if($salaire){
            return back()->with("successDelete","le salaire a ete supprimer avec succes");

        }

        return back()->with("successDelete","Erreur lors de la suppression");


      }

    }
