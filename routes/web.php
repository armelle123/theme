<?php


use App\Http\Controllers\CandidatsController;
use App\Http\Controllers\CongesController;
use App\Http\Controllers\FichiersController;
use App\Http\Controllers\OffresController;
use App\Http\Controllers\SalairesController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UsersController;
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
// Route::get('/', function () {
//     return redirect('login');
// });
Route::redirect('/','/login');

// Route::get('/site', function () {
//     return redirect()->route('offreList');
// });


Route::middleware('auth')->group(function(){
    Route::get('/app', function () {
        return view('home');
    });
});
Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware('auth')->group(function(){
 Route::get('users',[UsersController::class,'index'])->name('users');
Route::get('users/all', [UsersController::class, 'index'])->name('users.index');
Route::get('users/create', [UsersController::class, 'create'])->name('user.add');
// Route::post('users/store', [UsersController::class, 'store'])->name('user.add.store');
Route::post('users/store', [UsersController::class, 'store'])->name('user.edit.store');
Route::get('users/edit/{id}', [UsersController::class, 'edit'])->name('user.edit');
Route::delete("users/delete", [UsersController::class, 'delete'])->name('user.delete');
Route::get('users/block_compte/{id}', [UsersController::class, 'block_compte'])->name('block_compte');
Route::get('users/activate_compte/{id}', [UsersController::class, 'activate_compte'])->name('activate_compte');
Route::get('users/edit_infos/{id}', [UsersController::class, 'edit_infos'])->name('user.edit.infos');
Route::post('users/add_store', [UsersController::class, 'add_store'])->name('user.add.store');



Route::get('/offres', [\App\Http\Controllers\SiteController::class, 'index'])->name('site.offre');
Route::post("/offres/create", [OffresController::class,"store"])->name('offres.ajouter');
Route::get('/offres',[OffresController::class,'index'])->name('offres');

Route::get('/offres/create', [OffresController::class,'create'])->name('offres.create');
Route::delete("/offres/{offre}", [OffresController::class,"delete"])->name('offres.supprimer');
Route::delete("/salaires/{salaire}", [SalairesController::class,"delete"])->name('salaires.supprimer');
Route::get("/offres/{offre}", [OffresController::class,"edit"])->name("offre.edit");
Route::put("/offres/{offre}", [OffresController::class,"update"])->name("offre.update");
Route::get('offres/publier/{id}', [OffresController::class,'publier'])->name('offre.publier');
Route::get('offres/depublier/{id}', [OffresController::class,'depublier'])->name('offre.depublier');
Route::get('/valider', [OffresController::class,"valider"])->name("offres.search");
// Route::put("changer_statut/{offre_id}", [OffresController::class,"changer_statut"])->name("changer_statut");
// Route::PUT('changer_statut/{offre_id}','OffresController@changer_statut')->name("changer_statut");
// Route::put("/offres/{offre}", [OffresController::class,"valider"])->name("offre.valider");
// Route::put("/offres/{offre}", [OffresController::class,"annuler"])->name("offre.annuler");
// Route::put("/offres/{offre}", [OffresController::class,"encours"])->name("offre.encours");


// Route::post("/users/create", [UsersController::class,"store"])->name('users.ajouter');
// // Route::post("/users/create", [UsersController::class,"store"])->name('users.ajouter');
// Route::get('/users/create', [UsersController::class,'create'])->name('users.create');
// Route::get('/valider', [UsersController::class,"valider"])->name("users.valider");
// Route::get("/users", [UsersController::class,"search"])->name("users.edit");
// Route::get("/users", [UsersController::class,"index"])->name("users");



Route::post("/conges/create", [CongesController::class,"store"])->name('conges.ajouter');
Route::get('/conges',[CongesController::class,'index'])->name('conges');
Route::get('/conges/create', [CongesController::class,'create'])->name('conges.create');
Route::delete("/conges/{conge}", [CongesController::class,"delete"])->name("conges.supprimer");
Route::get("/conges/{conge}", [CongesController::class,"edit"])->name("conges.edit");
Route::put("/conges/{conge}", [CongesController::class,"update"])->name("conges.update");
// Route::get('/search', [CongesController::class,"search"])->name("conges.search");


Route::get('/salaires',[SalairesController::class,'index'])->name('salaires');
Route::post("/salaires/create", [SalairesController::class,"store"])->name('salaires.ajouter');
Route::get('/salaires/create', [SalairesController::class,'create'])->name('salaires.create');
Route::delete("/salaires/{salaire}", [SalairesController::class,"delete"])->name('salaires.supprimer');
Route::get("/salaires/{salaire}", [SalairesController::class,"edit"])->name("salaire.edit");
Route::put("/salaires/{salaire}", [SalairesController::class,"update"])->name("salaires.update");
// Route::get('/recherche', [SalairesController::class,"recherche"])->name("salaire.search");


Route::post("/fichiers/create", [FichiersController::class,"store"])->name('fichiers.ajouter');
Route::get('/',[FichiersController::class,'index'])->name('fichiers');
Route::get('/fichiers/create', [FichiersController::class,'create'])->name('fichiers.create');
Route::delete("/fichiers/{fichier}", [FichiersController::class,"delete"])->name('fichiers.supprimer');
Route::get("/fichiers/{fichier}", [FichiersController::class,"edit"])->name('fichiers.edit');
// Route::get('/rechercher', [FichiersController::class,"rechercher"])->name('fichiers.search');
// Route::get("/fichiers", [FichiersController::class,"print"])->name('print');
//Route::get("/fichiers/{fichier}", [FichiersController::class,"update"])->name('fichiers.update');




// Route::put('/leaves/{conges_id}','CongesController@update')->name("conges.update");
// Route::post('candidat','CandidatsController@store')->name('candidat.store');

Route::get('/site', [SiteController::class, 'index'])->name('site.offre');
Route::get('/site/offre/detail/{offre_id}', [SiteController::class, 'detail'])->name('site.offre.detail');
 Route::post('/site/offre/postuler', [SiteController::class, 'postuler'])->name('site.offre.postuler');
 Route::get('/offre/{departement}', 'SiteController@offresByDepartement');
// Route::GET('/site/offre/postuler', [SiteController::class, 'enregistrer']);
// Route::get('/site/offre/ajouter', [SiteController::class,'ajouter'])->name('site.offre.ajouter');

Route::get('/candidats',[CandidatsController::class,'indexCandidat'])->name('candidats');
Route::get('/candidat/create', [CandidatsController::class,'create'])->name('candidat.create');
Route::get('candidat/valider/{id}', [CandidatsController::class,'valider'])->name('candidat.valider');
Route::get('candidat/annuler/{id}', [CandidatsController::class,'annuler'])->name('candidat.annuler');
Route::post('/save', [CandidatsController::class,'store'])->name('candidat.store');
Route::get("/candidat", [CandidatsController::class,"enregistrerFichierRecu"])->name('candidature.recu');
Route::delete("/candidats/{candidat}", [CandidatsController::class,"delete"])->name('candidats.supprimer');


// Route::get('/fichiers','\App\Http\Controllers\FichiersController@store')->name('fichiers.store');
});





