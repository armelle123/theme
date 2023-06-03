<?php

namespace App\Http\Controllers;
use App\Models\Conges;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CongesController extends Controller
{        public function index(){
    $conges =Conges::orderby("conges_id","desc")->paginate(5);
    return view('rh.app.conges.ListConges',compact("conges"));
  }


  public function create(){
    // $classes = classe::all();
    return view('rh.app.conges.ajouterConges');
  }

  public function edit($conges_id){

     $conge = Conges::find($conges_id);
    // $classes = classe::all();
    return view('rh.app.conges.editConges', compact("conge"));
  }





  public function store (Request $request){

    $request->validate([
      "motif" => "required",
      "debut_conges" => "required",
      "fin_conges" => "required",

    ]);

    //Conges ::create($request->all());

    Conges::create([
      "motif"=>$request->motif,
      "debut_conges" =>$request->debut_conges,
      "fin_conges" =>$request->fin_conges,
      "description" =>$request->description,
      "statut_approuver_conges" =>0,
      "user_id" =>Auth::user()->id,
      "commentaire" =>'',


    ]);

    return back()->with("success", "Conges ajouter avec succes");

  }

  




//   /**
//    * Summary of update
//    * @param \Illuminate\Http\Request $request
//    * @param mixed $conges_id
//    * @return \Illuminate\Http\RedirectResponse
//    */
//   public function update(Request $request, $Leave){
//    $leave = $Leave::findOrFail($Leave);
//    $leave->motif = $request->input('motif');
//    $leave->debut_conges =$request->input('debut_conges');
//    $leave->fin_conges =$request->input('fin_conges');
//    $leave->description =$request->input('description');
//    $leave->statut_approuver_conges =$request->input('statut_approuver_conges');
//    $leave->user_id =$request->input('user_id');
//    $leave->commentaire =$request->input('commentaire');
//    $leave->save();


//    return redirect('rh.app.conges.updateConges')->with('success','le conges a ete modifier avec succes');

//   }

// public function update(Request $request ,$conges_id){
//     //recuperer le conges a modifier
//     $conge = Conges::findOrFail($conges_id);
//     //mettre a jour les proprietes
//     $conge->motif =$request->input('motif');
//     $conge->debut_conges =$request->input('debut_conges');
//     $conge->fin_conges =$request->input('fin_conges');
//     $conge->description =$request->input('description');
//     // $conge->statut_approuver_conges =$request->input('statut_approuver_conges');
//     // $conge->user_id =$request->input(Auth::user());
//     // $conge->commentaire =$request->input('commentaire');
//     //enregistrer les modifications dans la bd
//     $conge->save();

//  //rediriger lutilisateur vers la liste des conges avec un message de succes
//    return redirect()->route('conges.update')->with('success',"le conges a ete modifier avec succes");
//  }


public function update($conges_id){

    $conge = Conges::find($conges_id);
   // $classes = classe::all();
   return view('rh.app.conges.updateConges', compact("conge"));
 }






  public function delete($conges_id){
    // $motif = $conges ->motif ." ".$conges->description;

    $conges = Conges::find($conges_id)->delete();
    // dd($conges);
    if($conges){
        return back()->with("successDelete","le conges supprimer avec succes");

    }

    return back()->with("successDelete","Erreur lors de la suppression");


  }
}




