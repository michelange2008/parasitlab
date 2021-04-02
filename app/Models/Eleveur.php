<?php
/**
 * @category user
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

/**
 * Une des catégories (usertypes) d'User: Eleveur est le propriétaire
 * des animaux sur lesquels sont fait les analyses
 *
 * Comme les deux autres catégories d'user (Labo, Véto), Eleveur appartient à user
 * Il a aussi une relation belongsTo à Veto car un éleveur peut avoir un véto attitré
 *
 *  __Table eleveurs:__
 * + id
 * + user_id
 * + num: varchar(255) --> numéro EDE
 * + address_1: varchar(191)
 * + address_2: varchar(191)
 * + cp: varchar(10)
 * + commune : varchar(191)
 * + pays: varchar(191)
 * + indicatif:varchar(3)
 * + tel: varchar(10)
 * + veto_id
 * + timestamps
 *
 * @package Utilisateurs
 * @subpackage Eleveur
 */
class Eleveur extends Model
{
    protected $fillable = ['user_id'];
    /**
     * Tout éleveur appartient à  User
     *
     * @return belongsTo
     */
    public function user()
    {
      return $this->belongsTo(User::class);
    }

    /**
     *  Tout éleveur possède un véto (qui peut être nul)
     *
     * @return belongsTo
     */
    public function veto()
    {
      return $this->belongsTo(Veto::class);
    }
}
