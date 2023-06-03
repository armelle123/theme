<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fichiers extends Model
{
    use HasFactory;
    protected $primarykey='fichier_id';
    protected $tables='fichier';

    protected $fillable = [
        'titre_fichier',
        'nature_fichier',
        'chemin_fichier',
        'user_id',

    ];
    public function User(){
        return $this->belongsto(User::class );
    }


}
