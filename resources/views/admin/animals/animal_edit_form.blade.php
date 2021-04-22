<form class="" action="{{ route('animal.update', $animal->id) }}" method="post">

  @csrf

  @method('patch')

  <div class="form-group row">

    <label for="num" class="col-sm-2 col-form-label">@lang('form.num')</label>

    <div class="col-sm-8">

      <input type="text" name="numero" class="form-control" id="num" value="{{ $animal->numero }}">

    </div>

  </div>

  <div class="form-group row">

    <label for="nom" class="col-sm-2 col-form-label">@lang('form.nom')</label>

    <div class="col-sm-8">

      <input type="text" name="nom" class="form-control" id="nom" value="{{ $animal->nom }}">
      
    </div>

  </div>

  @enregistreAnnule(['route' => route('animal.index')])

</form>
