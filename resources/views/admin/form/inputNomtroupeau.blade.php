<div class="form-group row">

  <label class="col-lg-auto col-form-label" for="nom">@lang('form.edit_nom_troupeau')</label>

  <div class="col-lg">

    @isset($troupeau_nom)

      <input class="form-control" type="text" name="nom" value="{{ $troupeau->nom}}">

    @else

      <input class="form-control" type="text" name="nom" placeholder="@lang('form.choix_nom_troupeau')">

    @endisset

  </div>

</div>

</div>
