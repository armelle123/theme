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
  }
  public function create(){
    return view('user.add');
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
      ]);
      User::create($request->all());
      return redirect()->route('users.index')
      ->with ('success','user create succeffuly');

    }

}





