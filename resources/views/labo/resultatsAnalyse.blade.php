@include('labo.demandeShow.demandeSerie')

@if (!$demande->acheve)

  <div class="my-3">

    @bouton([
      'type' => 'route',
      'route' => 'prelevement.create',
      'id' => $demande->id,
      'intitule' => 'boutons.add_one_prel',
      'fa' => "fas fa-plus-square"
    ])

  </div>

@endif

@foreach ($demande->prelevements as $prelevement)

  @if ($demande->acheve)

    @if ($prelevement->toutNegatif)

      @include('labo.resultats.resultatsNegatifs')

    @else

      @include('labo.resultats.resultatsPositifs')

    @endif

  @else

    @include('labo.resultats.resultatsPositifs')

  @endif


@endforeach

@include('labo.prelevements.prelevementNonRenseigne')
