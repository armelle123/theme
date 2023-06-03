<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conges extends Model
{
    use HasFactory;
    protected $primaryKey= 'conges_id';
    protected $tables='conges';

    protected $fillable = [

        'statut_approuver_conges',
        'motif',
        'debut_conges',
        'fin_conges',
        'commentaire',
        'description',
        'user_id',
    ];

    public function User(){
        return $this->belongsto(User::class );
    }


}
