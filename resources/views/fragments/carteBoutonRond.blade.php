<div class="card">

  <a href="{{ route($route, $id ?? '') }}" data-toggle="tooltip" data-placement="top" title="@lang('commun.know_more')">

    <img class="m-3 img-change" src="{!! 'storage/img/icones/'.$icone !!}" alt="email">

  </a>

  <div class="card-body">

    <h3 class="card-header">{{ $titre }}</h3>

    <p class="text-left mt-2">{{ $texte_1 ?? '' }}</p>

    <p class="text-left">{{ $texte_2 ?? ''}}</p>

    <p class="text-left">{{ $texte_3 ?? ''}}</p>

  </div>

  <div class="text-left mb-2 ml-2">

    @include('fragments.bouton')

  </div>

</div>
