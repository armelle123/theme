<?php

namespace App\Http\Controllers;
use App\Models\Conges;
use App\Models\User;
use GuzzleHttp\Psr7\Message;
use Illuminate\Support\Facades\Validator;
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





  public function store (Request $request ){

    $request->validate([
      "motif" => "required",
      "debut_conges" => "required",
      "fin_conges" => "required",

    ]);
    //on decommente tout

    //Conges ::create($request->all());
    // if ($user){
    //     $user_id = $user->id;
    //   }
    //   else{, $id,$user,$user_id

    //   }

    Conges::create([
      "motif"=>$request->motif,
      "debut_conges" =>$request->debut_conges,
      "fin_conges" =>$request->fin_conges,
      "description" =>$request->description,
      "statut_approuver_conges" =>0,
      "user_id"=>Auth::user()->id,

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

/* public function update(Request $request ,$conges_id){
     //recuperer le conges a modifier
     $conge = Conges::findOrFail($conges_id);
     //mettre a jour les proprietes
     $conge->motif =$request->input('motif');
     $conge->debut_conges =$request->input('debut_conges');
     $conge->fin_conges =$request->input('fin_conges');
     $conge->description =$request->input('description');
     // $conge->statut_approuver_conges =$request->input('statut_approuver_conges');
     // $conge->user_id =$request->input(Auth::user());
     // $conge->commentaire =$request->input('commentaire');
     //enregistrer les modifications dans la bd
     $conge->save();

  //rediriger lutilisateur vers la liste des conges avec un message de succes
    return redirect()->route('conges.update')->with('success',"le conges a ete modifier avec succes");
  }
  */


public function update(Request $request, $conges_id){

    $conge = Conges::findOrFail($conges_id);
    if($conge->user_id !=auth()->id()){
        return redirect()->route('conges.update',['conge'=>$conge->conges_id])->with('error',"vous ne pouver pas modifier ce conge");

    }
        $request->validate([
        'motif' => 'required|string|max:255',
       'debut_conges'=> 'required|date',
       'fin_conges'=> 'required|date',
       'description' => 'required|string|max:255',
        ]);
        // mettre a jour les informations du conge
        $conge->motif = $request->input('motif');
        $conge->debut_conges = $request->input('debut_conges');
        $conge->fin_conges = $request->input('fin_conges');
        $conge->description = $request->input('description');
        // sauvergarder dans la base de donne

     $conge->save();

   // $classes = classe::all();
   return redirect()->route('conges.update',['conge'=>$conge->conges_id])->with('success',"le conges a ete modifier avec success");
 }








  public function delete($conges_id){
    // $motif = $conges ->motif ." ".$conges->description;

    $conges = Conges::find($conges_id)->delete();
    // dd($conges);
    if($conges){
        return back()->with("success","le conges supprimer avec succes");

    }

    return back()->with("danger","Erreur lors de la suppression");


  }
//   public function valider(Request $request){
//     $search = $request->input('search');
//     Conges::where(  'debut_conges','LIKE','%debut_conges%')->get();
//     return view('rh.app.conges.ListConges' , compact('conge'));

//   }
// public function search (Request $request){
//     $search = $request->query('search');
//     $conges = Conges::query()
//     ->where('motif','LIKE',"%{$search}%")
//     ->orWhere ('debut_conges','LIKE',"%{$search}%")
//     ->orWhere ('fin_conges','LIKE',"%{$search}%")
//     ->orWhere ('commentaire','LIKE',"%{$search}%")
//     ->orWhere ('description','LIKE',"%{$search}%")
//     ->paginate(10);
//     return view('rh.app.conges.ListConges' , compact('conges'));



// }
}




