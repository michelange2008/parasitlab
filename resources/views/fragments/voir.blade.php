<!-- FRAGMENT POUR FAIRE LIEN VERS LE DETAIL D'UN ITEM: ELEVEUR, VETO, DEMANDE
VARIABLES À PASSER: id, nom, route
 -->

<a href="{{ route( $route , $id) }}"

  data-toggle="tooltip" data-placement="top"

  title="cliquer pour plus d'informations">

    <i class="text-center text-success material-icons">launch</i>

</a>
