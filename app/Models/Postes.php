<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postes extends Model
{
    protected $primarykey='poste_id';
    protected $tables='poste';

    protected $fillable = [

        'description_poste',
        'titre_poste',

    ];
}
