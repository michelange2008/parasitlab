<div id="choisirTuto" class="mx-3 p-5 alert-secondary" style="display:none">

  {{-- <p class="lead">@lang('choisir.tuto_titre')</p> --}}

  <p class="lead">@lang('choisir.tuto_intro')</p>

  <img class="img-50" src="{{ url('storage/img/icones/fleche_gauche.svg') }}" alt="flèche gauche">

  <p>@lang('choisir.tuto_liste')</p>

  <p class="pr-2"><strong>@lang('choisir.tuto_choix') @lang('choisir.tuto_clic')</strong></p>

  <p class="lead text-secondary">Catégories&nbsp;:</p>

  <div class="col-8 offset-2">

    <ul class="list-group">

      <li class="list-group-item-trans alert-bleu">@lang('choisir.obs')</li>

      <li class="list-group-item font-italic">@lang('choisir.obs_texte')</li>

      <li class="list-group-item-trans alert-bleu">@lang('choisir.act')</li>

      <li class="list-group-item font-italic">@lang('choisir.act_texte')</li>

      <li class="list-group-item-trans alert-bleu">@lang('choisir.situ')</li>

      <li class="list-group-item font-italic">@lang('choisir.situ_texte')</li>

    </ul>

  </div>

  <div class="bg-rouge-tres-fonce p-3 text-white my-3">

    <p class="ml-2 mb-1">@lang('choisir.tuto_veto')</p>

  </div>

  <button id="avousdejouer" class="btn btn-bleu"><i class="fas fa-mouse"></i> @lang('choisir.jouer')</button>

</div>
