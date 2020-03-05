<h5 class="card-title mx-3">{{ mb_strtoupper($titre) }}</h5>

@if ($id !== "")

  <a href="{{ route($route, $id) }}" title="voir">

    <i class="color-rouge-tres-clair fas fa-eye"></i>

  </a>

@endif
