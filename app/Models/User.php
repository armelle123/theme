<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [

        'firstname',
         'lastname',
         'adresse',
         'phone',
         'idrole',
         'poste',
        'poste_id',
        'archived',
        'deleted',
        'deleted_at',
        'deleted_by',
       'departement_id',
        'email',
        'email_verified_at',
        'password',
         'remember_token',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function conges(){
        return $this->hasMany(Conges::class);
    }
    public function salaires(){
        return $this->hasMany(Salaires::class);
    }
    public function offres(){
        return $this->hasMany(Offres::class);
    }

    public function fichiers(){
        return $this->hasMany(Fichiers::class);
    }
}

