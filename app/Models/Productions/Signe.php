<?php

namespace App\Models\Productions;

use Illuminate\Database\Eloquent\Model;

/**
 * Il s'agit de symptômes de parasitisme observés par les propriétaires d'animaux.
 *
 * Ces signes sont notés sur la demande de prélèvement. Par défaut ils sont absents.
 *
 * Le mot signe a été utilisé à la place de symptômes car certains signes (mauvaise
 * croissance) ne sont pas de symptômes.
 *
 * ATTENTION: sur cette table a été réalisée un essai pour régler la question de la traduction
 * des éléments en base de donnée: dans la colonne _nom_, les intitulés sont notés de la
 * façon suivante: _signes.xxxx_ (exemple _signes.diarrhee_). Cela fait référence au fichier
 * _signes.php_ dans les sous-répertoire fr, en, ... du répertoire _resources/lang_.
 *
 * Même si cela semble être la seule solution pour permettre une véritable internationalisation
 * du site, la méthode n'a pas été retenue pour les autres tables car cela donne des
 * contenus de champs un peu incompréhensibles sources d'erreur potentielles.
 *
 * _Table_:
 * + _id_: int(10) UNSIGNED NOT NULL,
 * + _nom_: varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
 */
class Signe extends Model
{
    /**
     * @var boolean
     */
    public $timestamps = false;

    /**
     * Tout signe peut être associé à plusieurs prélèvements par l'intermédiaire
     * d'une table pivot.
     * @return belongsToMany
     */
    public function prelevements()
    {
      return $this->belongsToMany(Prelevement::class);
    }
}
