<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salaires extends Model
{
    use HasFactory;
    protected $primaryKey='salaire_id';
    protected $table='salaires';

    protected $fillable = [

        'montant_salaire',
        'mois',
        'commentaire',
        'type_salaires',
        'user_id',
    ];
    public function User(){
        return $this->belongsto(User::class );
    }

}

