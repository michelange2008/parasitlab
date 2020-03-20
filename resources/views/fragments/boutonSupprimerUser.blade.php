
<form id="form_{{ $id }}" class="suppr"
  action="{{ route('user.destroy', $id) }}" method="POST">

  {{  csrf_field() }}

  {{ method_field('DELETE') }}

  <button class="btn btn-rouge mx-1" type="submit" name="ok"

    data-toggle="tooltip" data-placement="top"

    title="Suppression de l'utilisateur">

      Supprimer
      

  </button>
