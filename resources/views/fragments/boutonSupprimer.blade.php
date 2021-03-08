
<form id="form_{{ $id }}" class="suppr" action="{{ route($route, $id) }}" method="POST">

  @csrf

  @method('DELETE')

  <button class="btn btn-rouge mx-1" type="submit" name="ok"

    data-toggle="tooltip" data-placement="top"

    title="@lang('boutons.del')">

      <i class="{{ $fa ?? 'fas fa-trash-alt' }}"></i> {{ __($intitule ?? 'boutons.del') }}


  </button>

</form>
