<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'usertype',
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

    public function eleveur()
    {
      return $this->hasOne(Models\Eleveur::class);
    }

    public function Labo()
    {
      return $this->hasOne(Models\Labo::class);
    }

    public function usertype()
      {
        return $this->belongsTo(Models\Usertype::class);
      }

    public function veto()
    {
      return $this->hasOne(Models\Veto::class);
    }

    public function factures()
    {
      return $this->hasMany(Models\Productions\Facture::class);
    }

    public function serie()
    {
      return $this->hasOne(App\Models\Productions\Serie::class);
    }

    public function blogs()
    {
      return $this->hasMany(Models\Parasitisme\Blog::class);
    }

    public function troupeaus()
    {
      return $this->hasMany(Models\Troupeau::class);
    }
    public function demandes()
    {
      return $this->hasMany(Models\Productions\Demande::class);
    }
    public function userfacts()
    {
      return $this->hasMany(Models\Productions\Demande::class, 'id', 'userfact_id');
    }
    public function tovetousers()
    {
      return $this->hasMany(Models\Productions\Demande::class, 'id', 'tovetouser_id');
    }
}
