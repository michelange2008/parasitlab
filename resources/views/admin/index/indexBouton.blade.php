{{-- LE BOUTON QUI S AFFICHE DEPEND DU TYPE D UTILISATEUR: labo (ajouter une demande), Veto ou eleveur (nous contacter) --}}


{{-- LE BOUTON AJOUTER UNE DEMANDE D ANALYSE NE S AFFICHE QUI SI L UTILISATEUR CONNECTE EST DU LABO --}}
@if (auth()->user()->usertype->code === "labo")

  <div id="toolbar">

    <a href="{{ route($datas->add->route) }}" type="submit" class="btn btn-rouge"><i class="fas fa-plus-square"></i> {{ $datas->add->titre}}</a>

  </div>

@else

  <div id="toolbar">

    @include('fragments.boutonContact')

  </div>

@endif
