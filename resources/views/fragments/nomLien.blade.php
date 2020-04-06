<!-- FRAGMENT POUR AFFICHER UN NOM (VETO, ELEVEUR, ETC.) AVEC UN LIEN VERS
LA FICHE CORRESPONDANTE
VARIABLES: id, route, nom -->
<a href="{{ route($route, $id)}}"
  data-toggle="tooltip" data-placement="top"
  title="{{ __($tooltip ?? 'tooltips.affiche_infos') }}"
  class="">
  {{ $before ?? ''}}
  {!! $nom !!} {!! $icone ?? '<i class="color-bleu-tres-tres-clair fas fa-eye"></i>' !!}
  {{ $after ?? '' }}
</a>
