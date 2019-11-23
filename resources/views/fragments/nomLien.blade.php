<!-- FRAGMENT POUR AFFICHER UN NOM (VETO, ELEVEUR, ETC.) AVEC UN LIEN VERS
LA FICHE CORRESPONDANTE
VARIABLES: id, route, nom -->

<a href="{{ route($route, $id)}}"
  data-toggle="tooltip" data-placement="top"
  title="cliquer pour afficher les informations">
  {{ $nom }}
</a>
