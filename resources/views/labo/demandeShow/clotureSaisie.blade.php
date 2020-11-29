@if ($demande->acheve)

  <a id="acheve_signe" class="mx-3" diabled>

    <img class="img-40 d-block"
    src="{{ url('storage/img/icones/saisie_cloturee.svg')}}"
    alt="saisie"
    title="@lang('tooltips.saisie_cloturee', ['date' => \Carbon\Carbon::parse($demande->date_resultat)->isoFormat('LL')]) ">

  </a>

@else

  <a id = "non_acheve" class="mx-3" href="{{ route('resultats.cloture', $demande->id )}}">

    <img class="img-40 d-block"
    src="{{ url('storage/img/icones/saisie_a_cloturer.svg')}}"
    alt="saisie"
    title="@lang('boutons.saisie_a_cloturer') ">

  </a>

@endif
