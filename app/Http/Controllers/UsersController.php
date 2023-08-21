<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function getUsers(){
        $user=DB::table('user')->get();
    }

    protected function index()
{
     $users =User::all();
     return view('user.index',compact("users"));
    // $users =User::paginate(10);
    // return view('rh.app.utilisateur.listuser',compact("users"));

    // $users =User::all();
    // $users =DB::table('users')->join('departements','postes','users.departement_id','users.poste_id','=','departements.departement_id','postes.poste_id')
    // ->select('users.*','departements.nom','postes.titre_poste')
    // ->paginate(5);
    // return view('rh.app.user.listusuer',compact("users"),['users'=>$users]);
  }
  public function create(){

    return view('user.add');
    // return view('rh.app.utilisateur.ajouter');
  }
  public function edit($id){

    $users = User::find($id);


   // $classes = classe::all();
   return view('user.edit', compact("users"));
 }


  protected function store(Request $request)
  {
      $request->validate([
          'firstname' => ['required'],
          'lastname' => ['required'],
          'adresse' => ['required'],
          'phone' => ['required'],
          'idrole' => ['required'],
          'poste' => ['required'],
          'poste_id' => ['required'],
          'archived' => ['required'],
          'deleted' => ['required'],
          'deleted_at' => ['required'],
          'deleted_by' => ['required'],
          'departement_id' => ['required'],
          'email' => ['required'],
          'verified_at' => ['required'],
          'password' => ['required'],
          'remember_token' => ['required'],


    //     'firstname' => ['required'],
    //     'lastname' => ['required'],
    //     'adresse' => ['required'],
    //     'phone' => ['required'],
    //     'poste' => ['required'],
    //     'email' => ['required'],
    //     'password' => ['required'],
       ]);
      User::create($request->all());
      return redirect()->route('users.index')
      ->with ('success','user create succeffuly');


    // $users= new User([
    //     'firstname'=>$request->input('firstname'),
    //     'lastname'=>$request->input('lastname'),
    //     'adresse'=>$request->input('adresse'),
    //     'phone'=>$request->input('phone'),
    //     'poste'=>$request->input('poste'),
    //     'email'=>$request->input('email'),
    //     'password'=> Hash::make($request->input('password')),


    // ]);
    // $users->save();
    // return redirect()->back()->with('success','utlisateur ajouter avec success!');

    }
    // public function update(Request $request, User $users){
    //     $request->validate([
    //     'firstname' => 'required',
    //     'lastname' => 'required',
    //     'adresse' => 'required',
    //     'phone' => 'required',
    //     'poste' => 'required',
    //     'password' => 'required',
    //     'email' => 'required|email|unique:users,email,'


    //     ]);
    //     $users->firstname= $request->input('firstname');
    //     $users->lastname= $request->input('lastname');
    //     $users->adresse= $request->input('adresse');
    //     $users->phone= $request->input('phone');
    //     $users->poste= $request->input('poste');
    //     $users->email= $request->input('email');
    //     $users->save();
    //     return redirect()->route('users.index')->with('success','utilisateur mis a jour avec succes.');



    // }
    // public function destroy(User $users){
    //     $users->delete();
    //     return redirect()->route('employers supprimé avec success.');
    // }
    // public function valider (Request $request){

    //     $search = $request->query('search');
    //     $users = User::query()
    //     ->where('firstname','LIKE',"%{$search}%")
    //     ->where('lastname','LIKE',"%{$search}%")
    //     ->orWhere ('adresse','LIKE',"%{$search}%")
    //     ->orWhere ('phone','LIKE',"%{$search}%")
    //     ->orWhere ('poste','LIKE',"%{$search}%")
    //     ->paginate(10);
    //     return view('rh.app.utilisateur.listuser',compact("users"));



    //   }
    // public function update(Request $request, $salaire_id){

    //     $users = User::findOrFail($salaire_id);
    //     if($users->user_id !=auth()->id()){
    //         return redirect()->route('salaires.update',['users'=>$users->id])->with('error',"vous ne pouver pas modifier");

    //     }
    //     $request->validate([

    //         firstname'=>'requered',,
    //    'lastname'=>'requered',
    //      'adresse'=>'requered',,
    //     'phone'=>'requered',,
    //      'poste'=>'requered',,
    //  'email'=>'requered',,


    //       ]);
    //       $users = new User();
    //       $users->user_id=$request->user_id;
    //       $users->firstname=$request->firstname;
    //       $users->lastname=$request->lastname;
    //       $users->commentaiphonere=$request->phone;
    //       $users->type_userss=$request->type_userss;
    //       $users->save();

    //    // $classes = classe::all();
    //    return redirect()->route('rh.app.paie.listpaie')->with("success", "salaires  mis a jour avec succes");
    // }

    // public function delete($id){
    //     // $motif = $conges ->motif ." ".$conges->description;

    //     // $users = User::find($id)->delete();
    //     // // dd($offres);
    //     // if($users){
    //     //     return back()->with("success","l\'utilisateur a été supprimer avec succes");

    //     // }

    //     // return back()->with("danger","Erreur lors de la suppression");
    //     // $users=User::all()
    //     $users = User::find($id)->delete();;
    //     $users->delete();
    //        return redirect()->route('l\'utilisateur supprimé avec success.');
    // }
    public function delete( Request $request){
        // $motif = $conges ->motif ." ".$conges->description;


        $users = User::find($request->id)->delete();
        // dd($conges);
        if($users){
            return back()->with("success"," supprimer avec succes");

        }

        return back()->with("danger","Erreur lors de la suppression");


      }

    // public function delete(User $users){
    //     // $users=User::all();
    //         $users->delete();
    //     return redirect()->route('l\'utilisateur supprimé avec success.');


    //   }
      public function block_compte($id){
        $users= User::find($id);
        $users->is_active=0;
        $users->save();
        return redirect()->back()->with('success','compte bloqué avec success');

      }
      public function activate_compte($id){
        $users= User::find($id);
        $users->is_active=1;
        $users->save();
        return redirect()->back()->with('success','compte bloqué avec success');

      }
      public function add_store(){





       return view('user.add');
     }



}





