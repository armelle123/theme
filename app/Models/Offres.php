<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offres extends Model
{
    protected $primaryKey='offre_id';
    protected $tables='offre';

    protected $fillable = [

        'nom_offre',
        'description_offre',
        'statut_offre',
         'date_debut_offre',
         'date_fin_offre',
         'user_id',
    ];

    public function User(){
        return $this->belongsto(User::class );
    }

}
