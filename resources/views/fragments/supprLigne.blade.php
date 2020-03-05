<!-- FRAGMENT DESTINE A FAIRE UN BOUTON suppr AVEC UNE CONFIRMATION PAR JQUERY
ET UN ROUTAGE VERS LA METHODE destroy
VARIABLES: id ET route
-->

<form id="form_{{ $id }}" class="suppr"
  action="{{ route($route, $id) }}" method="POST">

  {{  csrf_field() }}

  {{ method_field('DELETE') }}

  <button class="btn" type="submit" name="ok"

    data-toggle="tooltip" data-placement="top"

    title="Suppression de la ligne">

      <i class="text-center text-danger fas fa-trash-alt"></i>

  </button>

</form>
