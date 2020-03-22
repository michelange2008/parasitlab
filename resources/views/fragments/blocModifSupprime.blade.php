@if (auth()->user())

  <div class="col-12 d-flex flex-row justify-content-end">

    <form id="edit_{{ $item->id }}" class="edit" action="{{ route($class.'.edit', $id) }}" method="get">

      @csrf

      <button class="btn btn-sm mx-2 btn-outline-info" type="submit" name="edit"><i class="fas fa-edit"></i> Modifier</button>

    </form>

    <form id="{{ $item->id }}" class="suppr" action="{{ route($class.'.destroy', $id) }}" method="post">

      @csrf

      @method('DELETE')

      <button class="btn btn-sm btn-outline-danger mx-2" type="submit" name="edit"><i class="fas fa-trash-alt"></i> Supprimer</button>

    </form>

  </div>

@endif
