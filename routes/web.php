<?php


use App\Http\Controllers\CongesController;
use App\Http\Controllers\FichiersController;
use App\Http\Controllers\OffresController;
use App\Http\Controllers\SalairesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return redirect('login');
});



Route::get('/app', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/offres', [App\Http\Controllers\SiteController::class, 'index'])->name('site.offre');
Route::post("/conges/create", [CongesController::class,"store"])->name('conges.ajouter');
Route::post("/offres/create", [OffresController::class,"store"])->name('offres.ajouter');
Route::post("/salaires/create", [SalairesController::class,"store"])->name('salaires.ajouter');
Route::post("/fichiers/create", [FichiersController::class,"store"])->name('fichiers.ajouter');


Route::get('/conges',[CongesController::class,'index'])->name('conges');
Route::get('/offres',[OffresController::class,'index'])->name('offres');
Route::get('/salaires',[SalairesController::class,'index'])->name('salaires');
Route::get('/fichiers',[FichiersController::class,'index'])->name('fichiers');

Route::get('/conges/create', [CongesController::class,'create'])->name('conges.create');


Route::get('/offres/create', [OffresController::class,'create'])->name('offres.create');
Route::get('/salaires/create', [SalairesController::class,'create'])->name('salaires.create');
Route::get('/fichiers/create', [FichiersController::class,'create'])->name('fichiers.create');



Route::delete("/conges/{conge}", [CongesController::class,"delete"])->name("conges.supprimer");
Route::delete("/offres/{offre}", [OffresController::class,"delete"])->name('offres.supprimer');
Route::delete("/salaires/{salaire}", [SalairesController::class,"delete"])->name('salaires.supprimer');
Route::delete("/fichiers/{fichier}", [FichiersController::class,"delete"])->name('fichiers.supprimer');

Route::get("/conges/{conge}", [CongesController::class,"edit"])->name("conges.edit");
Route::get("/offres/{offre}", [OffresController::class,"edit"])->name("offre.edit");
Route::get("/salaires/{salaire}", [SalairesController::class,"edit"])->name("salaire.edit");



Route::put("/conges/{conge}", [CongesController::class,"update"])->name("conges.update");
Route::put("/offres/{offre}", [OffresController::class,"update"])->name("offre.update");
Route::put("/salaires/{salaire}", [SalairesController::class,"update"])->name("salaire.update");
// Route::put('/leaves/{conges_id}','CongesController@update')->name("conges.update");


