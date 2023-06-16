<?php

namespace App\Http\Controllers;

use App\Models\Departements;
use App\Models\Offres;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OffresController extends Controller
{
    //
    public function index(){
        // $offres =Offres::orderby("offre_id","desc")
        $offres =DB::table('offres')->join('departements','offres.departement_id','=','departements.departement_id')
        ->select('offres.*','departements.nom')
        ->paginate(5);
        return view('rh.app.offre.listoffre',compact("offres"));
      }


      public function create(){
        // $classes = classe::all();
        $departements= Departements::all();

        return view('rh.app.offre.ajouteroffre',compact("departements"));


      }
    //   public function (){
    //     // $classes = classe::all();
    //     $departements= Departements::all();
    //     return view('rh.site.offre.offreList',compact("departements"));
    //   }


      public function store (Request $request){

        $request->validate([
          "nom_offre"=>"required",
          "departement_id"=>"required",
          "date_debut_offre"=>"required",
          "date_fin_offre"=>"required",
          "description_offre"=>"required",
          "type_offre"=>"required",
        ]);

        //Etudiant ::create($request->all());

       Offres::create([
          "nom_offre"=>$request->nom_offre,
          "departement_id" =>$request->departement_id,
          "type_offre" =>$request->type_offre,
          "description_offre" =>$request->description_offre,
          "date_debut_offre" =>$request->date_debut_offre,
          "date_fin_offre" =>$request->date_fin_offre,
          "user_id" =>Auth::user()->id,
          "statut_offre" =>0,

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
      public function site (){
        return view('rh.site.offreList');
      }
      public function programmation(){
        // $classes = classe::all();
        return view('rh.site.programmationsite');
      }
    }


