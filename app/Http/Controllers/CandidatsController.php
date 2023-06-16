<?php

namespace App\Http\Controllers;
use App\Models\Candidats;
use App\Models\Offres;
use Illuminate\Http\Request;
use illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
class CandidatsController extends Controller
{
    public function index()
    {
        $offres =Offres::all();
                return view('rh.site.offreList',compact('offres'));
            }


    public function create($offre_id){
        $offre =Offres::all();
        return view('rh.site.candidatcreate',compact("offre"));

    }

    public function store(Request $request){
        $candidat =$request->file('file');
        if($candidat != null) {  $candidatName = $candidat->getClientOriginalName();}
        // $fichier->move(public_path('uploads'),
        // $fichierName);cv_cand
        if ($request->hasFile('cv_cand') && $request->file('cv_cand')->isValid()){
            $candidat = $request->file('cv_cand');
            $destinationPath = '/public/candidat';

            if($candidat != null) {  $candidatName = $candidat->getClientOriginalName();}
        // $fichier->move(public_path('uploads'),
        // $fichierName);cv_cand
        if ($request->hasFile('lettremotiv_cand') && $request->file('lettremotiv_cand')->isValid()){
            $candidat = $request->file('lettremotiv_cand');
            $destinationPath = '/public/candidat';

            if($candidat != null) {  $candidatName = $candidat->getClientOriginalName();}
        // $fichier->move(public_path('uploads'),
        // $fichierName);cv_cand
        if ($request->hasFile('diplome_bts_cand') && $request->file('diplome_bts_cand')->isValid()){
            $candidat = $request->file('diplome_bts_cand');
            $destinationPath = '/public/candidat';

            if($candidat != null) {  $candidatName = $candidat->getClientOriginalName();}
            // $fichier->move(public_path('uploads'),
            // $fichierName);cv_cand
            if ($request->hasFile('diplome_licence_cand') && $request->file('diplome_licence_cand')->isValid()){
                $candidat = $request->file('diplome_licence_cand');
                $destinationPath = '/public/candidat';

                if($candidat != null) {  $candidatName = $candidat->getClientOriginalName();}
                // $fichier->move(public_path('uploads'),
                // $fichierName);cv_cand
                if ($request->hasFile('diplome_bts_cand') && $request->file('diplome_bts_cand')->isValid()){
                    $candidat = $request->file('diplome_bts_cand');
                    $destinationPath = '/public/candidat';

            $candidatName = time() . '.' . $candidat->getClientOriginalExtension();
            $description_fichier = $request->input('email_cand');
            $type_fichier = $request->input('tel_cand');
            $type_fichier = $request->input('email_confirmer_cand');
            if (!empty($fichierName)&& !empty($email_cand) &&!empty($tel_cand) &&!empty($email_confirmer_cand)){
                $candidat->move(public_path("candidat"),$fichierName);
                //enregistrer les donnees dans la base de donnees
            }


            // dd($request);
            $request->validate([

                'nom_cand'=>'required|max:255',
                'prenom_cand' => 'required',
                'email_cand' => 'required',
                'tel_cand' => 'required',
                'email_confirmer_cand' => 'required',
                // 'chemin_fichier' =>'required|file|max:2048',

            ]);
            $user= Auth::user();
            $candidat = new Candidats;
                $candidat ->nom_cand = $request->input('nom_cand');
                $candidat ->prenom_cand = $request->input('prenom_cand');
                $candidat ->email_cand = $request->input('email_cand');
                $candidat ->tel_cand = $request->input('tel_cand');
                $candidat ->email_confirmer_cand = $request->input('email_confirmer_cand');


                $candidat->user_id= $user->id;
                $candidat->cv_cand= $candidatName;
                $candidat->lettremotiv_cand= $candidatName;
                $candidat->diplome_bts_cand= $candidatName;
                $candidat->diplome_licence_cand= $candidatName;
                $candidat->diplome_masteur_cand= $candidatName;


                $candidat->save();

                return redirect()->back()->with('succes', 'le fichier a ete bien ajouter');
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

    // public function store (Request $request){

    //     $request->validate([
    //       "nom_cand" =>'required',
    //       "prenom_cand" =>'required',
    //       "email_cand" =>'required|email',
    //       "tel_cand" =>'required',
    //       "cv_cand" =>'required|mimes:pdf,doc,docs|max:2048',
    //       "lettremotiv_cand" =>'required|mimes:pdf,doc,docs|max:2048',

    //       "diplome_bts_cand" =>'required|mimes:pdf,doc,docs|max:2048',
    //       "diplome_licence_cand" =>'required|mimes:pdf,doc,docs|max:2048',
    //       "diplome_masteur_cand" =>'required|mimes:pdf,doc,docs|max:2048',

    //       "email_confirmer_cand" =>'required|email',
    //     ]);
    //     $candidat = new Candidats;
    //         $candidat->offre_id = $request->input('offre_id');
    //         $candidat->nom_cand = $request->input('nom_cand');
    //             $candidat->prenom_cand = $request->input('prenom_cand');
    //             $candidat->email_cand = $request->input('email_cand');
    //             $candidat->tel_cand = $request->input('tel_cand');

    //             $candidat->email_confirmer_cand = $request->input('email_confirmer_cand');

    //             $cv_cand =$request->file('cv_cand');
    //             $cv_candPath = $cv_cand->store('cv_cand','public');
    //             $candidat->cv_cand =$cv_candPath;

    //             $lettremotiv_cand =$request->file('cv_cand');
    //             $lettremotiv_candPath = $lettremotiv_cand->store('lettremotiv_cand','public');
    //             $candidat->lettremotiv_cand =$lettremotiv_candPath;

    //             $diplome_bts_cand =$request->file('diplome_bts_cand');
    //             $diplome_bts_candPath = $diplome_bts_cand->store('diplome_bts_cand','public');
    //             $candidat->diplome_bts_cand =$diplome_bts_candPath;

    //             $diplome_licence_cand =$request->file('diplome_licence_cand');
    //             $diplome_licence_candPath = $diplome_licence_cand->store('diplome_licence_cand','public');
    //             $candidat->diplome_licence_cand =$diplome_licence_candPath;

    //             $diplome_masteur_cand =$request->file('diplome_masteur_cand');
    //             $diplome_masteur_candPath = $diplome_masteur_cand->store('diplome_masteur_cand','public');
    //             $candidat->diplome_masteur_cand =$diplome_masteur_candPath;
    //             $candidat->save();

    //             return redirect('/candidats')->with('success','votre candidature a ete envoyer avec success');






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





        }}}}}}
