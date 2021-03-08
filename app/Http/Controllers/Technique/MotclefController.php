<?php

namespace App\Http\Controllers\Technique;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Parasitisme\Motclef;
use App\Models\Parasitisme\Blog;

class MotclefController extends Controller
{

  public function listeBlogs($motclef_id)
  {

    $motclef = Motclef::find($motclef_id);

    $liste_blogs = Collect();

    foreach ($motclef->blogs as $blog) {

      $liste_blogs->push($blog->id);

    }

    return $liste_blogs;
  }
}
