<?php

namespace App\Models\Analyses;

use Illuminate\Database\Eloquent\Model;
/**
 * Unité de facturation
 *
 * **Ana** lyse **Acte**
 *
 * Exemple: une coproscopie de strongles gastro-intestinaux, un kit d'envoi,
 * une visite d'élevage (dans l'avenir), etc.
 *
 * __Table anaactes:__
 * + _id_
 * + _num_: varchar (255) destiné initialement à donner un numéro sous forme 1-a pour le choix des Analyses
 * + _abbreviation_: vachar(50) exemple _indiv_ pour analyse individuelle
 * + _nom_: varchar (191)
 * + _description_: (text)
 * + _anatype_id_: cf. Anatype.php
 * + _estSerie_: booléen true si cet acte est une série cf. Serie.php c'est-à-dire une analyse qui va se répéter avec les même animaux
 * + _propPrelv_: booléen true si la facturation est proportionnelle au nombre de prélèvements
 * + _estActif_: booléen true si c'est un acte proposé aux éleveurs/vétos
 * + _estTarif_: booléen true si doit apparaître dans les tarifs
 * + _icone_id_: cf. Icone.php
 * + _pu_ht_: decimal(8,2) prix unitaire hors taxe
 * + _tva_id_: cf. Tva.php
 *
 * @see Anatype
 * @see \App\Models\Productions\Serie
 * @see \App\Models\Icone
 * @see Tva
 */
class Anaacte extends Model
{
    /**
     * La notion de timesamps n'a pas de sens car c'est défini une fois pour toute
     * @var boolean
     */
    public $timestamps = false;

    /**
     * Un anaacte se retrouve dans chaque demande
     * @return hasMany
     */
    public function demandes()
    {
      return $this->hasMany(\App\Models\Production\Demande::class);
    }

    /**
     * Une anaacte se retrouve dans chaque série
     * @return hasMany
     */
    public function series()
    {
      return $this->hasMany(\App\Models\Production\Serie::class);
    }

    /**
     * Chaque anaacte appartient à un anatype
     * @return belongsTo
     */
    public function anatype()
    {
      return $this->belongsTo(Anatype::class);
    }

    /**
     * Chaque anaacte a une icone (qui peut être partagée par d'autres objets)
     * @return belongsTo
     */
    public function icone()
    {
      return $this->belongsTo(\App\Models\Icone::class);
    }

    /**
     * Chaque anaacte appartient à une classe de TVA
     * @return belongsTo
     */
    public function tva()
    {
      return $this->belongsTo(Tva::class);
    }

    /**
     * Des anaactes peuvent se retrouver à plusieurs dans différentes factures
     * @return belongsToMany
     */
    public function factures()
    {
      return $this->belongsToMany(Factures::class);
    }

    /**
     * Différents anaactes peuvent appartenir à différentes observations
     * @return belongsToMany
     * @deprecated La nouvelle version de l'algorithme ne fait plus de lien avec des anaactes, jsute des anatypes
     */
    public function observations()
    {
      return $this->belongsToMany(\App\Models\Observation::class);
    }

    /**
     * Différents anaactes peuvent appartenir à différentes options
     * @return belongsToMany
     * @deprecated La nouvelle version de l'algorithme ne fait plus de lien avec des anaactes, jsute des anatypes
     */
    public function options()
    {
      return $this->belongsToMany(\App\Models\Option::class);
    }

    /**
     * un anaacte peut exister pour plusieurs especes différentes
     * @return belongsToMany
     */
    public function especes()
    {
      return $this->belongsToMany(\App\Models\Espece::class);
    }

    /**
     * un anaacte peut exister pour plusieurs ages différentes
     * @return belongsToMany
     */
    public function ages()
    {
      return $this->belongsToMany(\App\Models\Age::class);
    }

    /**
     * Différents anaactes peuvent appartenir à différentes exclusions
     * @return belongsToMany
     * @deprecated La nouvelle version de l'algorithme ne fait plus de lien avec des anaactes, jsute des anatypes
     */
    public function exclusion()
    {
      return $this->hasOne(\App\Models\Analyses\Anaacte::class);
    }
}
