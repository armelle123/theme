<?php

namespace Database\Seeders;

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
            'nom' => 'maintenace',
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
        
        $this->call( UserstableSeeder::class);
    }
}
