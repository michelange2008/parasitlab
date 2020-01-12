<!-- FRAGMENT POUR AFFICHER UN NOM (VETO, ELEVEUR, ETC.) AVEC UN LIEN VERS
LA FICHE CORRESPONDANTE
VARIABLES: id, route, nom -->
<a href="{{ route($route, $id)}}"
  data-toggle="tooltip" data-placement="top"
  title="{{ $tooltip ?? "cliquer pour afficher les informations" }}"
  class="">
  {{ $nom }} <i class="color-bleu-tres-tres-clair fas fa-eye"></i>
</a>
