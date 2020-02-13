<div class="card">

  <img class="img-100" src="{!! asset('storage/img').'/'.$image !!}" alt="{{ $image }}">

  <div class="card-body">

    <h2 class="card-title">{{ $titre }}</h2>

    <p class="card-text">{{ $texte_1 }}</p>

    <p class="card-text">{{ $texte_2 ?? "" }}</p>

  </div>

  <div class="card-footer">

    @include('fragments.bouton', ['type' => 'route', 'route' => $route, 'intitule' => $intitule ?? "En savoir plus"])

  </div>

</div>
