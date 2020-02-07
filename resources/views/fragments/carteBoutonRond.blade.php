<div class="card">

  <a href="{{ route($route) }}" data-toggle="tooltip" data-placement="top" title="En savoir plus">

    <img class="m-3" src="{!! asset('storage/img/icones').'/'.$icone !!}" alt="email">

  </a>

  <div class="card-body">

    <h3 class="card-header">{{ $titre }}</h3>

    <p>{{ $texte_1 ?? '' }}</p>

    <p>{{ $texte_2 ?? ''}}</p>

    <p>{{ $texte_3 ?? ''}}</p>

  </div>

</div>
