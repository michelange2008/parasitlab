<?php

namespace App\Models\Parasitisme;

use Illuminate\Database\Eloquent\Model;

/**
 * Motclef pour le blog.
 * __Table__:
 * + _id_
 * + _motclef_: varchar(50)
 * + _timestamps_
 *
 * @package Technique
 */
class Motclef extends Model
{
  /**
   * @var array
   */
  protected $fillable = ['motclef'];

  /**
   * Relation many to many avec Blog
   * @return belongsToMany
   */
  public function blogs()
  {
    return $this->belongsToMany(Blog::class);
  }
}
