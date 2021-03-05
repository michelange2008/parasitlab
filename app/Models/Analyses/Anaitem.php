<?php

namespace App\Models\Analyses;

use Illuminate\Database\Eloquent\Model;

/**
 * Brique élémentaire d'observation d'un parasite
 *
 * **Ana**lyse **Item**
 *
 * Il s'agit d'un parasite ou d'un groupe de parasites dont on fournit les éléments de présence (opg, pres/abs, ++, etc.).
 *
 * Exemple: strongles gastro-intestinaux, nématodirus, trichuris, etc.
 *
 * __Table__:
 * + id
 * + abbreviation: varchar(4)
 * + nom: varchar(191)
 * + unité_id: Unité dans laquelle est comptée le parasite. cf. Unite.php
 * + qtt_id: Type de comptage (quantitatif, qualitatif), cf. Qtt.php
 * + image: varchar(255) nom du fichier image correspondant au parasite
 *
 * @see Unite
 * @see Qtt
 *
 */
class Anaitem extends Model
{
  /**
   * La notion de timesamps n'a pas de sens car c'est défini une fois pour toute
   * @var boolean
   */
    public $timestamps = false;

    public function qtt()
    {
      return $this->belongsTo(Qtt::class);
    }

    public function unite()
    {
      return $this->belongsTo(Unite::class);
    }

    public function resultats()
    {
      return $this->hasMany(\App\Models\Productions\Resultat::class);
    }

    public function analyses()
    {
      return $this->belongsToMany(Analyse::class);
    }

}
