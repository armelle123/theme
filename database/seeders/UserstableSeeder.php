<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


use Illuminate\Database\Seeder;

class UserstableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(25)->create();

        // DB::table('users')->insert([
        //     'nom' => 'admin',
        //     'prenom' => 'admin',
        //     'password' => Hash::make('password'),
        //     'email' => 'admin@gmail.com',
        //     'adresse'=>'bepanda',
        //     'phone' => '55685565',
        //     'is_active' => '1',
        //     'idrole' => 'admin',
        //     'poste'=>'secretaire',
        //     'departement_id'=>'1',
        //     'poste_id'=>'1',
        //     'archived'=>'1',
        //     'deleted'=>'1',
        //     'deleted_by'=>'yes',
        //     'deleted_at'=>'1',

        // ]);

        // DB::table('users')->insert([
        //     'nom' => 'user',
        //     'prenom' => 'user',
        //     'password' => Hash::make('password'),
        //     'email' => 'user@gmail.com',
        //     'adresse'=>'bepanda',
        //     'phone' => '55685565',
        //     'is_active' => '1',
        //     'idrole' => 'user',
        //     'poste'=>'user',
        //     'departement_id'=>'1',
        //     'poste_id'=>'1',
        //     'archived'=>'1',
        //     'deleted'=>'1',
        //     'deleted_by'=>'yes',
        //     'deleted_at'=>'1',
        // ]);
    }
    }

