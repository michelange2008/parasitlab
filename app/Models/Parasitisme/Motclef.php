<?php

namespace App\Models\Parasitisme;

use Illuminate\Database\Eloquent\Model;

class Motclef extends Model
{
  protected $fillable = ['motclef'];

  public function blogs()
  {
    return $this->belongsToMany(Blog::class);
  }
}
