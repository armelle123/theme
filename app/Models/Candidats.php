<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidats extends Model
{
    use HasFactory;
    protected $tables='candidat';
    protected $primarykey='candidat_id';
    protected $fillable = [

        'nom_cand',
        'prenom_cand',
        'email_cand',
        'tel_cand',
        'cv_cand',
        'lettremotiv_cand',
        'id_candidat',
        'diplome_bts_cand',
        'diplome_licence_cand',
        'diplome_masteur_cand',
        'statuts_cand',
        'email_confirmer_cand',
        'offre_id',
    ];

}
