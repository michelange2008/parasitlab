<?php

namespace App\Models\Algorithme;

use Illuminate\Database\Eloquent\Model;
/**
 * Elément pour déterminer le choix d'une analyse dans l'algorithme
 *
 * Les observations sont soit des choses observées sur l'animal et la troupeau,
 * soit des situation particulières (mise à l'herbe, entrée en bâtiment), soit
 * des situations locales (zones humides, saisies de douve, etc.)
 *
 * **Les champs de la table sont:** *id*, *intitulé* (varchar), *explication* (mediumtext),
 * *autres* (varchar -> autres causes possibles pour cette observation), *categorie_id*,
 * *ordre* (int -> permet de définir l'ordre dans l'affichage de la liste)
 * @package Algorithme
 */
class Observation extends Model
{
    public $timestamps = false;
    public $guarded = [];

    /**
     * Toute observation apparatient à une catégorie et une seule
     *
     * @return belongsTo
     */
    public function categorie()
    {
      return $this->belongsTo(\App\Models\Algorithme\Categorie::class);
    }

    /**
     * Une observation peut appartenir à plusieurs espèces
     * @return belongsToMany
     */
    public function especes()
    {
      return $this->belongsToMany(\App\Models\Espece::class);
    }

   /**
   * Une observation peut appartenir à plusieurs âges
   * @return belongsToMany
   */
    public function ages()
    {
      return $this->belongsToMany(\App\Models\Age::class);
    }

    /**
     * Une observation renvoie à plusieurs anatypes possibles
     * @return belongsToMany
     */
    public function anatypes()
    {
      return $this->belongsToMany(\App\Models\Analyses\Anatype::class);
    }

    /**
     * Toute exclusion est définie entre autre par une observation
     * @return hasOne
     */
    public function exclusion()
    {
      return $this->hasOne(\App\Models\Algorithme\Exclusion::class);
    }

    public function exclusionsAnaacte()
    {
      return $this->hasOne(\App\Models\Algorithme\ExclusionsAnaacte::class);
    }
}
