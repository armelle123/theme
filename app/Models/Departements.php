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
    public function User(){
        return $this->belongsto(User::class );
    }


    public function Offres(){
        return $this->hasMany(Offres::class);
    }

}
