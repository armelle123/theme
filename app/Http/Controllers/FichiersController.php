<?php

namespace App\Http\Controllers;

use App\Models\Fichiers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FichiersController extends Controller
{
            public function index(){
        $fichiers =Fichiers::orderby("fichier_id","desc")->paginate(5);
        return view('rh.app.archives.Listarchives',compact("fichiers"));
      }

      public function create(){
        // $fichiers= Fichiers::all();
        return view('rh.app.archives.ajouterarchive');
     }

    public function store(Request $request){
        $fichier =$request->file('file');
        if($fichier != null) {  $fichierName = $fichier->getClientOriginalName();}
        // $fichier->move(public_path('uploads'),
        // $fichierName);
        if ($request->hasFile('chemin_fichier') && $request->file('chemin_fichier')->isValid()){
            $fichier = $request->file('chemin_fichier');
            $destinationPath = '/public/fichier';
            $fichierName = time() . '.' . $fichier->getClientOriginalExtension();
            $description_fichier = $request->input('description_fichier');
            $type_fichier = $request->input('type_fichier');
            if (!empty($fichierName)&& !empty($description_fichier) &&!empty($type_fichier)){
                $fichier->move(public_path("fichier"),$fichierName);
                //enregistrer les donnees dans la base de donnees
            }

            // dd($request);
            $request->validate([

                'titre_fichier'=>'required|max:255',
                'description_fichier' => 'required',
                'type_fichier' => 'required',
                // 'chemin_fichier' =>'required|file|max:2048',

            ]);
            $user= Auth::user();
            $fichier = new Fichiers();
                $fichier ->titre_fichier = $request->input('titre_fichier');
                $fichier ->description_fichier = $request->input('description_fichier');
                $fichier ->type_fichier = $request->input('type_fichier');

                $fichier->user_id= $user->id;
                $fichier->chemin_fichier= $fichierName;


                $fichier->save();

                return redirect()->back()->with('succes', 'le fichier a ete bien ajouter');

        }
        // $fichier = new Fichiers([
        //     'titre_fichier' => $request->get('titre_fichier'),
        //     'description_fichier' =>  $request->get('description_fichier'),
        //     'type_fichier' =>  $request->get('type_fichier'),
        //     'chemin_fichier' => $request->get('chemin_fichier'),


        // ]);
        //$fichier->save();

        //return redirect()->back()->with('succes', 'le fichier a ete bien ajouter');

    }

// public function store(Request $request){
//     $request->validate([
//         'titre_fichier'=>'required',
//         'description_fichier'=>'required',
//         'type_fichier'=>'required',
//         'chemin_fichier'=>'required|file',
//     ]);
//     $fichier =$request->file('fichier');
//     $chemin =$fichier->store('fichiers');
//     $fichierTelecharge = $FichierTelecharge::create([
//         'titre_fichier'=> $request->input('titre_fichier'),
//         'description_fichier'=> $request->input('description_fichier'),
//         'type_fichier'=> $request->input('type_fichier'),
//         'chemin_fichier'=>$chemin_fichier,

//     ]);

// }
public function edit($fichier_id){

    $fichier = Fichiers::find($fichier_id);
   // $classes = classe::all();
   return view('rh.app.archives.editarchives', compact("fichier"));
 }

 public function delete($fichier_id){
    // $motif = $conges ->motif ." ".$conges->description;

    $fichier = Fichiers::find($fichier_id)->delete();
    // dd($conges);
    if($fichier){
        return back()->with("successDelete","le conges supprimer avec succes");

    }

    return back()->with("successDelete","Erreur lors de la suppression");


  }
}




