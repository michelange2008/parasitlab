<form id="{{ $exclusion_id }}" class="suppr"

  titre = "Suppression d'exclusion"

  texte = "Etes-vous sûr de supprimer cette exclusion ?"

  action = "{{ $route }}"

  method="post">

  @csrf
  @method('delete')

  <a href="#"><i class="fas fa-trash-alt" style="color:{{ $color }}"></i></a>

</form>
