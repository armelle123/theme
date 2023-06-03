<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salaires extends Model
{
    use HasFactory;
    protected $primaryKey='salaire_id';
    protected $tables='salaire';

    protected $fillable = [
        'nature_salaire',
        'montant_salaire',
        'date_salaire',
        'periode_salaire',
        'bonus_salaire',
        'avance_salaire',
        'user_id',
    ];
    public function User(){
        return $this->belongsto(User::class );
    }

}

