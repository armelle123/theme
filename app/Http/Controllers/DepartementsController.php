<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartementsController extends Controller
{
    public function getDepartements(){
        $departements=DB::table('departements')->get();
    }
}
