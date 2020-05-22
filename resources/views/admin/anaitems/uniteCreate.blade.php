{{-- paragraphe caché au départ destiné à créer une nouvelle unité voir anaitem.js --}}
<div id="para_unite" style="display:none">

  <h4 class="text-center">@lang('unites.new_unite')</h4>

  <form id="form_unite" action="{{ route('unites.create')}}" method="post">

    @csrf

    <div class="form-group">

      <label for="type">@lang('form.type_unite')</label>
      <select class="form-control" name="type_unite">
        <option value="@lang('unites.qttf')">@lang('unites.qttf')</option>
        <option value="@lang('unites.qltf')">@lang('unites.qltf')</option>
        <option value="@lang('unites.semiqttf')">@lang('unites.semiqttf')</option>
      </select>

    </div>

    <div class="form-group">

      <label for="nom_unite">@lang('form.nom')</label>
      <input class="form-control" type="text" name="nom_unite" value="" required>

    </div>

    @enregistreAnnule(['route' => route('anaitems.index')])

  </form>

</div>
