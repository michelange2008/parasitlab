<!-- FRAGMENT POUR AFFICHER UN NOM (VETO, ELEVEUR, ETC.) AVEC UN LIEN VERS
LA FICHE CORRESPONDANTE
VARIABLES: id, route, nom -->
@isset($tooltip)
  <a href="{{ route($route, $id)}}"
    data-toggle="tooltip" data-placement="top"
    title="{{ $tooltip }}"
    class="">
    {{ $nom }}
  </a>
@else
  <a href="{{ route($route, $id)}}"
    data-toggle="tooltip" data-placement="top"
    title="cliquer pour afficher les informations"
    class="">
    {{ $nom }}
  </a>

@endisset
