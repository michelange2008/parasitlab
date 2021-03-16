<?php

namespace App\Models\Productions;

use Illuminate\Database\Eloquent\Model;

/**
 * Commentaire ajouter à un résultat d'analyse
 *
 * Il s'agit d'un espace pour qu'une personne du laboratoire, celle qui a fait
 * l'analyse ou un autre ajoute un commentaire à un résultat d'analyse à destination
 * du propriétaire des animaux.
 *
 * __Table__:
 * + _id_
 * + _demande_id_
 * + labouser_id_: Il s'agit d'un user_id d'un objet Labo (Le choix a été fait d'utiliser le user_id et non
 * le id de l'objet Labo pour plus de cohérence. Sinon en cas de modification on se pose la question
 * de savoir si c'est un id ou un user_id )
 * + _commentaire_: mediumtext
 * + _date_commentaire_: timestamp
 *
 * @package Productions
 */
class Commentaire extends Model
{
    /**
     * Oui... on aurait pu garder le timestamps plutôt que de rajouter une date_commentaire !
     * @var boolean
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * Tout commentaire est forcément associé à une demande et une seule
     * @return belongsTo
     */
    public function Demande()
    {
      return $this->belongsTo(Demande::class);
    }


    /**
     * Tout commentaire est forcément associé à une user de Usertype Labo
     * @return belongsTo
     */
    public function Labo()
    {
      return $this->belongsTo(\App\Models\Labo::class);
    }
}
