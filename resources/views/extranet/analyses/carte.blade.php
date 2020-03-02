<div class="card">

  <img class="card-img-top" src="{!! asset('storage/img').'/'.$image !!}" alt="{{ $image }}">

  <div class="card-body">

    <h2 class="card-title">{!! $titre !!}</h2>

    <p class="card-text">{!! $texte_1 !!}</p>

    <p class="card-text">{!! $texte_2 ?? "" !!}</p>

  </div>

  <div class="card-footer">

    @include('fragments.bouton', ['type' => 'route', 'route' => $route, 'intitule' => $intitule ?? "En savoir plus", 'taille' => 'btn-lg'])

  </div>

</div>
