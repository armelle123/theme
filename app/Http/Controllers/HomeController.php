<?php

namespace App\Http\Controllers;

use App\Models\Candidats;
use App\Models\Conges;
use App\Models\Fichiers;
use App\Models\Offres;
use App\Models\Salaires;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users=User::all();
        $conges=Conges::all();
        $fichiers=Fichiers::all();
        $candidats=Candidats::all();
        $salaire=Salaires::all();
        $offre=Offres::all();

        return view('home' ,compact("users","conges","fichiers","candidats","salaire","offre"));
    }
}
