<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departements extends Model
{
    use HasFactory;
    protected $primarykey='departement_id';
    protected $tables='departement';

    protected $fillable = [
        'nom',
        'deleted',
    ];

}
