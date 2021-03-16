<?php

namespace App\Models\Productions;

use Illuminate\Database\Eloquent\Model;
use App\Models\Espece;

/**
 * Une série est une succession d'analyses portant sur les mêmes animaux
 *
 * Par exemple: un suivi parasitaire devrait porter sur quelques animaux prélevés
 * plusieurs fois dans la saison et sur les prélèvements desquels sont réalisées
 * les mêmes analyses.
 *
 * Un cas emblématique est le _Test de résistance_ pour lequel il doit y avoir une analyse
 * avant et une analyse après traitement sur les mêmes animaux.
 *
 * _Table_:
 * + _id_:int(10) UNSIGNED NOT NULL,
 * + _user_id_:int(10) UNSIGNED NOT NULL,
 * + _anaacte_id_:int(10) UNSIGNED NOT NULL,
 * + _espece_id_:int(10) UNSIGNED NOT NULL,
 * + _acheve_:boolean(1) NOT NULL DEFAULT 0, Vrai si l'analyse est achevée
 * + _created_at_:timestamp NULL DEFAULT NULL,
 * + _updated_at_:timestamp NULL DEFAULT NULL
 */
class Serie extends Model
{

    /**
     * Toute série est associées à au moins deux demandes
     * @return hasMany
     */
    public function demandes()
    {
      return $this->hasMany(Demande::class);
    }

    /**
     * Toute série est associée à un Anaacte
     *
     * Par exemple: "Analyses coprologiques de mélange avant et après vermifuge (5 à 8 animaux)"
     * @return belongsTo
     */
    public function anaacte()
    {
      return $this->belongsTo(\App\Models\Analyses\Anaacte::class);
    }

    /**
     * Toute Serie est associée à une Espece.
     *
     * ça fait un peu redondant avec les demandes associées.
     *
     * @return belongsTo
     */
    public function espece()
    {
      return $this->belongsTo(\App\Models\Espece::class);
    }

    /**
     * Toute Serie est associées à un User
     * @return belongsTo
     */
    public function user()
    {
      return $this->belongsTo(\App\User::class);
    }
}
