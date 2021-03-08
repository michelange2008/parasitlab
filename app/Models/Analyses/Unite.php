<?php

namespace App\Models\Analyses;

use Illuminate\Database\Eloquent\Model;

/**
 * Unité dans laquelle est estimé un parasite
 *
 * On peut avoir des unités de plusieurs types: quantitatif, qualitatif, semi-quantitatif
 *
 * Et les unités qui vont avec: opg, %, larves, ookystes, +/- ou -/+/++/+++
 *
 * __Table__:
 * + _id_
 * + _type_: varchar(50)
 * + _nom_: varchar(20)
 * @package Analyses
 */
class Unite extends Model
{
    /**
     * @var boolean
     */
    public $timestamps = false;

    public function anaitems()
    {
      return $this->hasMany(Anaitem::class);
    }
}
