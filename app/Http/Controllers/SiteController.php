<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    // retourne la paage du site avec la liste des offres
    public function index()
    {
        return view('rh.site.offreList');
    }
}
