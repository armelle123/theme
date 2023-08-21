<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departements extends Model
{
    use HasFactory;
    protected $primarykey='departement_id';
    protected $table='departements';

    protected $fillable = [
        'nom',
        'deleted',
    ];
    public function user(){
        return $this->belongsto(User::class );
    }


    public function offres(){
        return $this->hasMany(Offres::class,'departement_id','departement_id');
    }

}
