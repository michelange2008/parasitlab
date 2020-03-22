<?php

namespace App\Http\Controllers\Technique;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Parasitisme\Motclef;

class MotclefController extends Controller
{

  public function listeBlogs($motclef_id)
  {
    $motclef = Motclef::find($motclef_id);

    return json_encode($motclef->blogs);
  }
}
