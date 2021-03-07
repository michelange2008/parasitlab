<?php

namespace App\Models\Parasitisme;

use Illuminate\Database\Eloquent\Model;

/**
 * Blog d'information sur la parasitisme.
 *
 * Possède un titre, un contenu, une image, un créateur et un $timestamps
 *
 * Et en relation avec MotClef par une table pivot.
 *
 * __Table__:
 * + _id_
 * + _titre_: varchar(191)
 * + _introduction_: text
 * + _contenu_: text
 * + _image_: varchar(50) nom du fichier image avec extension
 * + _user_id_: l'auteur du blog est forcément un User de type laboratoire mais
 * il a été retenu d'utiliser l'__user_id__ et nom le __labo_id__
 * + _timestamps_
 * @package Technique
 */
class Blog extends Model
{
    /**
     * Tout blog est issu d'un créateur qui peut faire plusieurs blogs
     * @return belongsTo
     */
    public function user()
    {
      return $this->belongsTo(\App\User::class);
    }

    /**
     * Relation many to many avec les Motclef
     * @return belongsToMany
     */
    public function motclefs()
    {
      return $this->belongsToMany(Motclef::class);
    }
}
