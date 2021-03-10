<?php

namespace App\Models\Productions;

use Illuminate\Database\Eloquent\Model;

/**
 * Il s'agit d'une demande d'analyse
 *
 * __C'est l'objet central du site__
 *
 * Il est en lien à la fois avec utilisateurs (eleveur, veto destinataire des resultat,
 * labo qui fait les analyses, user destinataire de facture), des analyses (anaacte,serie),
 * des animaux (espece, troupeau), des prélèvements et des éléments liées aux résultats
 * (facture, commentaire, ) et plein de booléen qui décrivent l'état d'avancement
 * de la demande: achevée, signée, envoyée.
 *
 * __Table__:
 * + _id_ : int(10) UNSIGNED NOT NULL,
 * + _user_id_ : int(10) UNSIGNED DEFAULT NULL,
 * + _nb_prelevement_ : int(10) UNSIGNED NOT NULL,
 * + _espece_id_ : int(10) UNSIGNED DEFAULT NULL,
 * + _troupeau_id_ : int(10) UNSIGNED DEFAULT NULL,
 * + _anaacte_id_ : int(10) UNSIGNED NOT NULL,
 * + _serie_id_ : int(10) UNSIGNED DEFAULT NULL,
 * + _informations_ : mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
 * + _tovetouser_id_ : int(10) UNSIGNED DEFAULT NULL, vétérinaire destinataire des résultats
 * + _date_prelevement_ : timestamp NULL DEFAULT NULL,
 * + _date_reception_ : timestamp NULL DEFAULT NULL,
 * + _acheve_ : booléen(1) NOT NULL DEFAULT 0,
 * + _date_resultat_ : timestamp NULL DEFAULT NULL,
 * + _envoye_ : booléen(1) NOT NULL DEFAULT 0,
 * + _date_envoi_ : timestamp NULL DEFAULT NULL,
 * + _signe_ : booléen(1) NOT NULL DEFAULT 0,
 * + _date_signature_ : timestamp NULL DEFAULT NULL,
 * + _labo_id_ : int(10) UNSIGNED DEFAULT NULL,
 * + _userfact_id_ : int(10) UNSIGNED DEFAULT NULL, destinaire de la facture
 * + _facturee_ : booléen(1) NOT NULL DEFAULT 0,
 * + _facture_id_ : int(10) UNSIGNED DEFAULT NULL
 *
 * @package Productions
 */
class Demande extends Model
{
  /**
   * @var array
   */
    protected $guarded = [];
    /**
     * @var datetime
     */
    public $timestamps = false;

    /**
     * Toute demande provient d'un demandeur (propriétaire des animaux, eleveur)
     * @see \App\User
     * @return belongsTo
     */
    public function user()
    {
      return $this->belongsTo(\App\User::class);
    }

    /**
     * Toute demande concerne une espèce animale
     * @see \App\Models\Espece
     * @return belongsTo
     */
    public function espece()
    {
      return $this->belongsTo(\App\Models\Espece::class);
    }

    /**
     * Toute demande correspond à un anaacte
     * @see \App\Models\Analyses\Anaacte
     * @return belongsTo
     */
    public function anaacte()
    {
      return $this->belongsTo(\App\Models\Analyses\Anaacte::class);
    }

    /**
     * Toute demande est associée à une facture (peut-être null si la facture n'a pas encore été établie,
     * ce qui est toujours le cas au moment où on saisit la demande à l'arrivée des prélèvements)
     * @see \App\Models\Productions\Facture
     * @return belongsTo
     */
    public function facture()
    {
      return $this->belongsTo(Facture::class);
    }

    /**
     * Toute demande peut être associée à un veto qui reçoit copie des résultats
     * (peut-être null si l'éleveur a fait la demande que pour lui)
     * C'est l'id d'un objet User et non d'un objet Veto
     * @see \App\User
     * @return belongsTo
     */
    public function tovetouser()
    {
      return $this->belongsTo(\App\User::class, 'tovetouser_id', 'id');
    }

    /**
     * Toute demande est associée à plusieurs prélèvements (qui eux ne sont associés
     * qu'à cette seule demande)
     * @see \App\Models\Productions\Prelevement
     * @return hasMany
     */
    public function prelevements()
    {
      return $this->hasMany(Prelevement::class);
    }

    /**
     * Une demande peut être associée à une Serie (peut-être null)
     * @see \App\Models\Productions\Serie
     * @return belongsTo
     */
    public function serie()
    {
      return $this->belongsTo(Serie::class);
    }

    /**
     * Toute demande est associée à une personne du labo (TODO à compléter pour
     * savoir quand le labo_id est défini: à la saisie de la demande ou des résultats ?)
     * @see \App\Models\Labo
     * @return belongsTo
     */
    public function labo()
    {
      return $this->belongsTo(\App\Models\Labo::class);
    }

    /**
     * Toute demande est associée à un commentaire
     * @see \App\Models\Productions\Commentaire
     * @return belongsTo
     */
    public function commentaire()
    {
      return $this->belongsTo(Commentaire::class);
    }

    /**
     * Toute demande peut être associée à un troupeau
     * @see \App\Models\Troupeau
     * @return belongsTo
     */
    public function troupeau()
    {
      return $this->belongsTo(\App\Models\Troupeau::class);
    }

    /**
     * Toute demande a un destinataire de la facture qui n'est pas toujours le propriétaire (eleveur)
     * Ce userfact est l'id d'un User
     * @see \App\User
     * @return belongsTo
     */
    public function userfact()
    {
      return $this->belongsTo(\App\User::class, 'userfact_id', 'id');
    }
}
