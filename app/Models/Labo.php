<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Labo extends Authenticatable
{
    use Notifiable;

    protected $guard = 'labo';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function estLabo()
    {
      return true;
    }

    public function demandes()
    {
      return $this->hasMany(\App\Models\Productions\Demande::class);
    }

    public function commentaire()
    {
      return $this->hasMany(\App\Models\Productions::class);
    }

}
