<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fichiers extends Model
{
    use HasFactory;
    protected $primaryKey= 'fichier_id';
    protected $table='fichiers';

    protected $fillable = [
        'titre_fichier',
        'type_fichier',
        'description_fichier',
        'chemin_fichier',
        'user_id',

    ];
    public function User(){
        return $this->belongsto(User::class );
    }


}
