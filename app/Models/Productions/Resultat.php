<?php

namespace App\Models\Productions;

use Illuminate\Database\Eloquent\Model;

/**
 * Il s'agit du résultat d'une analyse (c-a-d Anaitem) sur un prélèvement.
 *
 * Cela ressemble un peu à une table pivot avec _prelevement_id_ et _anaitem_id_
 * auxquels s'ajoutent la valeur du résultat et un booléen disant si c'est positif ou pas.
 * IL a été fait le choix d'enregistrer les résultats négatifs pour des fin de
 * traitement statistiques. Cela allourdit considérablement la base de données mais
 * est indispensable pour effectuer des bilans.
 *
 * _Table_:
* + _id_:int(10) UNSIGNED NOT NULL,
* + _prelevement_id_:int(10) UNSIGNED NOT NULL,
* + _anaitem_id_:int(10) UNSIGNED NOT NULL,
* + _valeur_:varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
* + _positif_:boolean(1) NOT NULL DEFAULT 0
 *
 * @package Productions
 */
class Resultat extends Model
{
    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @var boolean
     */
    public $timestamps = false;

    /**
     * Tout résultat est lié à un prélèvemet mais un prélèvement a autant de résultats
     * qu'il y a d'anaitems.
     * @see \App\Models\Productions\Prelevement
     * @return belongsTo
     */
    public function prelevement()
    {
      return $this->belongsTo(Prelevement::class);
    }

    /**
     * Tout résultat est lié à un anaitem qui peut bien sûr avoir de nombreux résultats.
     * @see \App\Models\Analyses\Anaitem
     * @return belongsTo
     */
    public function anaitem()
    {
      return $this->belongsTo(\App\Models\Analyses\Anaitem::class);
    }
}
