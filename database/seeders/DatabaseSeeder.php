<?php

namespace Database\Seeders;

use Database\Seeders\UserstableSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('departements')->insert([
            'nom' => 'secretaria',
            'deleted' => 0,

        ]);
        DB::table('departements')->insert([
            'nom' => 'maintenance',
            'deleted' => 0,

        ]);
        DB::table('departements')->insert([
            'nom' => 'marketing',
            'deleted' => 0,

        ]);
        DB::table('departements')->insert([
            'nom' => 'software',
            'deleted' => 0,

        ]);
        DB::table('postes')->insert([
            'description_poste' => 'user',
            'titre_poste' => 'directeur',

        ]);

        DB::table('postes')->insert([
            'description_poste' => 'user',
            'titre_poste' => 'secretaire',

        ]);
        DB::table('postes')->insert([
            'description_poste' => 'user',
            'titre_poste' => 'responsable marketing',

        ]);
        DB::table('postes')->insert([
            'description_poste' => 'user',
            'titre_poste' => 'Software',

        ]);
        DB::table('postes')->insert([
            'description_poste' => 'user',
            'titre_poste' => 'maintenance',

        ]);

       
        //    catch(illuminateDatabaseQueryException $ex){
            //  $errorCode = $ex->errorInfo[1];
            //   if ($errorCode == 1264){
                 //gerer l'erreur 1264 ici
                //   return redirect()->back()->with('error', 'la valeur numeriques est hors limite');
            //   }}
            //   else{
                  //gerer toutes les autres erreurs ici
                //   return redirect()->back()->with('error', 'erreur lors de l'insertion des donnees');}
            //  }



        $this->call( UserstableSeeder::class);
    }
}

