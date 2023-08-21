<?php

namespace App\Http\Controllers;
use App\Models\Candidats;
use App\Models\Offres;
use Illuminate\Http\Request;
use illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use LeagueFlysystemFilessystem;
use League\Flysystem\Adapter\Local;
use PHPUnit\Util\Filesystem;

class CandidatsController extends Controller
{
    //  public function index()
    //  {
    //     $offres =Offres::all();
    //              return view('rh.site.offreList',compact('offres'));
    //         }
    public function index(){
        $candidat = Candidats::with('offre')->get();
        return view('rh.site.offreList', ['candidats' =>$candidat]);

    }


    public function create($offre_id){
        $offre =Offres::all();
        return view('rh.site.candidatcreate',compact("offre"));

    }
    // public function ajouterCandidat (Request $request){
    //     $candidat = new Candidats;
    //     $candidat->nom_cand = $request->input('nom_cand');
    //     $candidat->prenom_cand = $request->input('prenom_cand');
    //     $candidat->email_cand = $request->input('email_cand');
    //     $candidat->tel_cand = $request->input('tel_cand');
    //     $candidat->cv_cand = $request->file('cv_cand');
    //     $candidat->lettremotiv_cand = $request->file('lettremotiv_cand');
    //     $candidat->id_candidat = $request->input('id_candidat');
    //     $candidat->diplome_bts_cand = $request->file('diplome_bts_cand');
    //     $candidat->diplome_licence_cand = $request->file('diplome_licence_cand');
    //     $candidat->diplome_masteur_cand = $request->file('diplome_masteur_cand');
    //     $candidat->statuts_cand = $request->input('statuts_cand');
    //     $candidat->email_confirmer_cand = $request->input('email_confirmer_cand');
    //     $candidat->offre_id = $request->input('offre_id');

    //     $candidat->save();

    //     return redirect('/candidats');

    public function store (Request $request){

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
                $candidat->save();

                return redirect('/candidats')->with('success','votre candidature a ete envoyer avec success');






        //la methode store permet de stocker les fichiers pdf dans le disque dur public
        // $path =$request->file('cv_cand')->store('public/cv_cand');
        // $path =$request->file('lettremotiv_cand')->store('public/lettremotiv_cand');
        // $path =$request->file('diplome_bts_cand')->store('public/diplome_bts_cand');
        // $path =$request->file('diplome_licence_cand')->store('public/diplome_licence_cand');
        // $path =$request->file('diplome_masteur_cand')->store('public/diplome_masteur_cand');

        // $candidat = new Candidats([
        //     'nom_cand'=> $validatedData['nom_cand'],
        //     'prenom_cand'=> $validatedData['prenom_cand'],
        //     'email_cand'=> $validatedData['email_cand'],
        //     'tel_cand'=> $validatedData['tel_cand'],
        //     'id_candidat'=> $validatedData['id_candidat'],
        //     'statuts_cand'=> $validatedData['statuts_cand'],
        //     'email_confirmer_cand'=> $validatedData['email_confirmer_cand'],
        //     'cv_cand'=>$path,
        //     'lettremotiv_cand'=>$path,
        //     'diplome_bts_cand'=>$path,
        //     'diplome_licence_cand'=>$path,
        //     'diplome_masteur_cand'=>$path,



        // $candidat = new Candidats([
        //     'offre_id'=>$validatedData['offre_id'],
        // ]);
        // $candidat->candidat()->save($candidat);
        // return()->back()->with('success','votre candidature a ete envoyee avec succes.');

      }
    //   public function postuler(Request $request){
    //     $candidat = new Candidats;



    //   }

    public function enregistrerFichierRecu(){
        $candidats =Candidats::all();
        // $candidats = new Local('/public/candidature');
        return view('rh.app.recu.index',compact("candidats"));
        /*
        $candidats = Candidats::where('candidat_id')->get();
       // return view ('rh.app.recu.index', compact('fichiers'));
       // $fichiers = Fichiers::where('fichier_id',auth()->user()->id)->get();
       // $fichiers = Storage::fichiers('public');
       $candidats = new Local('/public/candidature');
       // $filesystem = new Filesystem($fichiers);
       // $files = $filesystem->$listcontents('/public/fichier');
       // return view('rh.app.recu.index', );
       return view ('rh.app.recu.index', compact('candidats'));
            */
     }


     public function indexCandidat(){
        $candidats =Candidats::orderby("candidat_id","desc")->get->paginate(5);
        return view('rh.app.recu.index',compact("candidats"));
      }

      public function delete($candidat_id){
        // $motif = $conges ->motif ." ".$conges->description;

        $candidats = Candidats::find($candidat_id)->delete();
        // dd($conges);
        if($candidats){
            return back()->with("success","le candidats supprimer avec succes");

        }

        return back()->with("danger","Erreur lors de la suppression");


      }
      public function valider($id){
        Candidats::where('candidat_id',$id)->update([
            'statuts_cand'=>1
         ]);


        return back()->with("success","candidature validé avec succes");


      }
      public function annuler($id){
     Candidats::where('candidat_id',$id)->update([
        'statuts_cand'=>-1
     ]);

        return back()->with("success","candidature  annulé avec succes");


      }
    }


