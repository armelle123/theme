<?php

namespace App\Http\Controllers;

use App\Models\Salaires;
 use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SalairesController extends Controller
{
    //
    public function index(){
        // $salaires=Salaires::all();


        $salaires =DB::table('salaires')->join('users','salaires.user_id','=','users.id')
        ->select('salaires.*','users.firstname')
        ->paginate(5);
        // $salaires =Salaires::orderby("salaire_id","desc")->paginate(5);
        return view('rh.app.paie.listpaie',compact("salaires"));
      }


      public function create(){
        // $classes = classe::all();
         $users = User::all();
        return view('rh.app.paie.ajouterpaie',compact("users"));
      }




     public function edit($salaire_id){

        $salaire = Salaires::find($salaire_id);
    //    // $classes = classe::all();
       return view('rh.app.paie.editpaie',compact("salaire"));
  }



      public function store (Request $request){

        $request->validate([
          "montant_salaire"=>"required",
          "mois"=>"required",
          "user_id"=>"required",
          "type_salaires"=>"required",

        ]);
             //Salaires ::create($request->all());

       Salaires::create([
         "user_id"=>$request->user_id,
         "montant_salaire" =>$request->montant_salaire,
         "mois" =>$request->mois,
         "commentaire" =>$request->commentaire,
         "type_salaires" =>$request->type_salaires,

    //     "user_id"=>Auth::user()->id,




     ]);

      return back()->with("success", "salaires ajouter avec succes");
    //return redirect()->route('rh.app.paie.listpaie')->with("success", "salaires ajouter avec succes");
    }
    // public function edit(Salaires $salaires){

    //     $users = User::all();
    //    // $classes = classe::all();
    //    return view('rh.app.paie.editpaie',compact("salaire","users"));
    //  }



     public function update(Request $request, Salaires $salaires){

        // $salaire = Salaires::find($salaire_id);



        $request->validate([
            'montant_salaire'=>'required|numeric',
            'mois'=>'required',
            'user_id'=>'required',
            'type_salaires'=>'required',


          ]);
          $salaire = new Salaires();
          $salaire->user_id=$request->user_id;
          $salaire->montant_salaire=$request->montant_salaire;
          $salaire->mois=$request->mois;
          $salaire->commentaire=$request->commentaire;
          $salaire->type_salaires=$request->type_salaires;
          $salaire->save();

       // $classes = classe::all();
       return redirect()->route('rh.app.paie.listpaie')->with("success", "salaires  mis a jour avec succes");
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
