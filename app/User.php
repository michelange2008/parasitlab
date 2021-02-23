<?php
namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
* Utilisateur
*
* Il y trois type d'utilisateurs: ils sont tous 3 dans la classe User mais
* possèdent un Usertype différent. L'utilisateur de type laboratoire possède
* tous les droits d'accès.
* Les utilisateurs de type eleveur et veterinaire n'ont accès qu'à leur
* page personnelle
*
* @param type var Description
* @return return type
*/
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

    /**
     * Tout eleveur a une user_id
     *
     * Eleveur est un User avec des droits spécifiques: accès à sa page perso
     *
     * @return return la classe Eleveur
     */
    public function eleveur()
    {
      return $this->hasOne(Models\Eleveur::class);
    }

    /**
     * Tout labo a une user_id
     *
     * Labo est un User aux droit très étendus (superuser)
     *
     * @return return la classe Labo
     */
    public function Labo()
    {
      return $this->hasOne(Models\Labo::class);
    }

    /**
     * Tout User appartient à un UserType
     *
     * L'UserType de l'User définit le groupe auquel il appartient: Labo, Veto
     * ou eleveur -> les droits associés sont différents
     */
    public function usertype()
      {
        return $this->belongsTo(Models\Usertype::class);
      }

    /**
     * Tout veto a un user_id
     *
     * Veto est un sous-type d'User qui a des droits spécifiques: accès aux
     * analyses dont il est destinataire (analyses de ses clients)
     *
     */
    public function veto()
    {
      return $this->hasOne(Models\Veto::class);
    }

    /**
     * Tout User possède une ou plusieurs factures
     *
     * Un facture possède toujours une user_id permettant de la rattacher à
     * un user précis.
     *
     */
    public function factures()
    {
      return $this->hasMany(Models\Productions\Facture::class);
    }

    /**
     * Une série est toujours rattachée
     * à un User précis
     *
     * Une série est une succession d'analyses portant sur les mêmes animaux
     *
     */
    public function serie()
    {
      return $this->hasOne(App\Models\Productions\Serie::class);
    }

    /**
     * Lien du blog avec son auteur
     *
     * Bien qu'il ne puisse y avoir qu'un User de usertype Labo qui puisse être
     * auteur d'un blog, il a été retenu que tout blog est rattaché à une
     * user_id plutôt qu'une labo_id
     *
     */
    public function blogs()
    {
      return $this->hasMany(Models\Parasitisme\Blog::class);
    }

    /**
     * Un troupeau possède toujours un User
     *
     * Bien qu'en général seul un éleveur puisse posséder un troupeau, il a été
     * décidé qu'un troupeau aurait une user_id et non une eleveur_id
     * PS: le 's' à troupeau n'est pas une faute d'orthographe mais le respect
     * de la syntaxe Laravel dans la dénomination par défauts de fonctions sur
     * de relation hasMany (ou ManytoMany).
     *
     */
    public function troupeaus()
    {
      return $this->hasMany(Models\Troupeau::class);
    }

    /**
     * Une demande d'analyse a toujours une user_id
     *
     * Tout user peut être demandeur d'analyse, y compris un User Labo
     *
     */
    public function demandes()
    {
      return $this->hasMany(Models\Productions\Demande::class);
    }
    /**
     * IL s'agit de l'user_id du User destinataire de la facture
     *
     * En effet, en fonction des situations, cela peut-être l'éleveur ou le
     * vétérinaires (ou le labo) qui est destinataire de la facture
     *
     */
    public function userfacts()
    {
      return $this->hasMany(Models\Productions\Demande::class, 'id', 'userfact_id');
    }

    /**
     * IL s'agit de l'user_id du Veto destinataire des résultats
     *
     * Une analyse peut être demandée par un éleveur sans que son véto en soit
     * forcément aussi le destinataire. A l'inverse, ce n'est pas forcément
     * le véto habituel qui est toujours destinataire de la copie des résultats.
     *
     */
    public function tovetousers()
    {
      return $this->hasMany(Models\Productions\Demande::class, 'id', 'tovetouser_id');
    }
}
