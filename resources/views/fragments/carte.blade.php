<div class="card">

  <img class="m-3" src="{!! asset('storage/img/icones').'/'.$icone !!}" alt="email">

  <div class="card-body">

    <h5 class="card-title">{{ $titre }}</h5>

    <p>{{ $texte_1 ?? '' }}</p>

    <p>{{ $texte_2 ?? ''}}</p>

    <p>{{ $texte_3 ?? ''}}</p>

  </div>

  <div class="card-footer">

    @include('fragments.bouton')

  </div>

</div>
