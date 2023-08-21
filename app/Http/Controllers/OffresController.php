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
        $offres =Offres::all();
        $offres =DB::table('offres')->join('departements','offres.departement_id','=','departements.departement_id')
        ->select('offres.*','departements.nom')
        ->orderBy("offre_id","desc")->get();
        return view('rh.app.offre.listoffre',compact("offres"),['offres'=>$offres]);
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



        $offres =Offres::create([
          "nom_offre"=>$request->nom_offre,
          "departement_id" =>$request->departement_id,
          "type_offre" =>$request->type_offre,
          "description_offre" =>$request->description_offre,
          "date_debut_offre" =>$request->date_debut_offre,
          "date_fin_offre" =>$request->date_fin_offre,
          "user_id" =>Auth::user()->id,
          "statut_offre" =>'0',

        ]);
        // dd($offres);


        return back()->with("success", "offres ajouter avec succes");

      }

      public function edit($offre_id){

        $offre = Offres::find($offre_id);
        $departements= Departements::all();

       // $classes = classe::all();
       return view('rh.app.offre.editoffre', compact("offre","departements"));
     }


    //  public function update($offre_id){

    //     $offre = Offres::find($offre_id);
    //    // $classes = classe::all();
    //    return view('rh.app.offre.updateoffre', compact("offre"));
    //  }


    public function update(Request $request, $offre_id){

        $offre = Offres::findOrFail($offre_id);
        // if($offre->user_id !=auth()->id()){
        //     return redirect()->route('offres.update',['offre'=>$offre->offre_id])->with('error',"vous ne pouver pas modifier ce offre");

        // }
            $request->validate([
            'nom_offre' => 'required|string|max:255',
            'type_offre' => 'required|string|max:255',
           'date_debut_offre'=> 'required|date',
           'date_fin_offre'=> 'required|date',
           'description_offre' => 'required|string|max:255',
            ]);
            // mettre a jour les informations du conge
            $offre->user_id=Auth::user()->id;
            $offre->offre_id;
            $offre->nom_offre = $request->input('nom_offre');
            $offre->type_offre = $request->input('type_offre');
            $offre->date_debut_offre = $request->input('date_debut_offre');
            $offre->date_fin_offre = $request->input('date_fin_offre');
            $offre->description_offre = $request->input('description_offre');
            // sauvergarder dans la base de donne

         $offre->save();

       // $classes = classe::all();
    //    return redirect()->route('offres.update',['offre'=>$offre->offre_id])->with('success',"le conges a ete modifier avec succesxa");
    return redirect()->route('offre.update',['offre'=>$offre->offre_id])->with('success',"l'offre a ete modifier avec success");
}




     public function delete($offre_id){
        // $motif = $conges ->motif ." ".$conges->description;

        $offre = Offres::find($offre_id)->delete();
        // dd($offres);
        if($offre){
            return back()->with("success","l'offre a ete supprimer avec succes");

        }

        return back()->with("danger","Erreur lors de la suppression");


      }
      public function site (){
        return view('rh.site.offreList');
      }
      public function programmation(){
        // $classes = classe::all();
        return view('rh.site.programmationsite');
      }
    //   public function statut(){

    //     return view('rh.app.offre.listoffre',compact("offres"))
    // public function done($offre_id){
    //     $save = Offres::where('offre_id',$offre_id)->update(['statut_offre' => 2]);
    //     if($save){
    //         return redirect()->route('offres.create')->with('success',"enregistrer avec success");
    //     }
    //     return redirect()->back()->with('danger',"desoler");
    // }
    // public function encours($offre_id){
    //     $save = Offres::where('offre_id', $offre_id)->edit(['statut_offre' => 1]);
    //     if ($save){
    //         return redirect()->route('offres')->with('success','enregistrer');
    //     }
    //     return redirect()->back()->with('danger',"desoler une erreur s'est produite");

    // }
    public function changerStatut(Request $request, $offre_id){
        $offre_id = $request->input('offre_id');
        $nouveauStatut = $request->input('nouveau_statut');
         $offres = Offres::findOrFail($offre_id);
         $offres->statut_offre = $nouveauStatut;
         $offres->save();


        // $offres = Offres::find($offre_id);
        // if($offres){
        //     //logique pour changer le statut
        //     $offres->statut_offre ='nouveau statut';
        //     $offres->save();
        //     //redirection vers la pages approprier
            return redirect()->back()->with('success','le statut a ete changer avec success.');

        //  }
        // return redirect()->back()->with('error','offre introuvable.');
        // $statut_offre =$request->input('statut_offre');
        // DB::table('offre')
        // ->where('offre_id','$offre_id')
        // ->changerStatut(['statut_offre'=> $statut_offre]);
        // return redirect()->route('offre.changer_statut');


    }
    // public function annuleroffre(){
    //     $statut_offre = "annuler";

    // }
    // public function valider (Request $request){
    //     $search = $request->query('search');
    //     $offres =Offres::query()
    //     ->where('nom_offre','LIKE',"%{$search}%")
    //     ->orWhere ('type_offre','LIKE',"%{$search}%")
    //     ->orWhere ('description_offre','LIKE',"%{$search}%")
    //     ->orWhere ('date_debut_offre','LIKE',"%{$search}%")
    //     ->orWhere ('date_fin_offre','LIKE',"%{$search}%")
    //     ->orWhere ('statut_offre','LIKE',"%{$search}%")
    //     ->paginate(10);
    //     return view('rh.app.offre.listoffre' , compact('offres'));



    // }
    public function publier($id){
        Offres::where('offre_id',$id)->update([
            'statut_offre'=>1
         ]);


        return back()->with("success","offre validé avec succes");


      }
      public function depublier($id){
     Offres::where('offre_id',$id)->update([
        'statut_offre'=>-1
     ]);

        return back()->with("success","offre  annulé avec succes");


      }



    }


