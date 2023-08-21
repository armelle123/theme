<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\Offres::SATUT_VALIDE;

class Offres extends Model
{
    // const STATUT_VALIDER = 'valider';
    // const STATUT_ANNULER = 'annuler';
    protected $primaryKey='offre_id';
    protected $table='offres';



    protected $fillable = [

        'nom_offre',
        'type_offre',
        'description_offre',
        'statut_offre',
         'date_debut_offre',
         'date_fin_offre',
         'user_id',
         'departement_id',
    ];

    public function User(){
        return $this->belongsto(User::class );
    }

    public function Departements(){
        return $this->belongsto(Departements::class,'departement_id','departement_id');
    }
    // public function statut_offre(){
    //     return $this->belongsto(statut_offre::class );

    // }



}
