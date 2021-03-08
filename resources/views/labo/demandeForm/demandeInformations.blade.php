<div class="row">

  <div class="col-md-10 mx-auto">

    <p class="lead pl-3 bg-bleu-tres-fonce text-white">@lang('form.infos_diverses')</p>

  </div>

</div>

<div class="row justify-content-center">

  <div class="col-md-10">

    <div class="form-group">

      <textarea class="form-control" id="informations" name="informations" rows="3"
        placeholder="@lang('form.info_prelevement')">{{ $demande->informations ?? '' }}</textarea>

    </div>

  </div>

</div>
