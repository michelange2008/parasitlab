@if ($demande->acheve)

  <a id="acheve_non_signe" class="icone-cadre mx-3" href="{{ route('resultats.edit', $demande->id )}}">

    <img class="img-40 d-block"
    src="{{ url('storage/img/icones/saisie_faite.svg')}}"
    alt="saisie"
    title="@lang('tooltips.saisie_faite', ['date' => \Carbon\Carbon::parse($demande->date_resultat)->isoFormat('LL')]) ">

  </a>

  <div id = "acheve_signe" class="icone-cadre mx-3" href="{{ route('resultats.edit', $demande->id )}}">

    <img class="img-40 d-block"
    src="{{ url('storage/img/icones/saisie_faite_signee.svg')}}"
    alt="saisie"
    title="@lang('tooltips.saisie_faite_signee', ['date' => \Carbon\Carbon::parse($demande->date_resultat)->isoFormat('LL')]) ">

  </div>

@else

  <a id = "non_acheve" class="icone-cadre mx-3" href="{{ route('resultats.edit', $demande->id )}}">

    <img class="img-40 d-block"
    src="{{ url('storage/img/icones/saisie_non_faite.svg')}}"
    alt="saisie"
    title="@lang('boutons.saisie_modif_result') ">

  </a>

@endif
