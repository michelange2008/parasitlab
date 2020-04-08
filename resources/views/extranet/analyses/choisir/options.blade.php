<h4 id="titre_options" class="mb-3"  style="display:none">@lang('choisir.motif')</h4>

<div id="liste_options">

  <div id="aucune_option"></div>

  @foreach ($qui_quand->contenu as $element) {{-- on boucle sur le json qui_quand.json qui renvoie au fichier de langue qui_quand.php --}}

    <div id="{{ $element }}" class="option" >

      <div class="media border p-3 bg-bleu-tres-clair">
        <img class="mr-3 d-none d-md-block" src="{!! url('storage/img/icones/'.$element.'svg') !!}" alt="{{ $element }}">
        <div class="media-body">
          <h4 class="mt-0">
            @lang($qui_quand->prefixe.$element.'titre')
          </h4>
          <p class="lead">@lang($qui_quand->prefixe.$element.'soustitre')</p>

        </div>

      </div>

      <div class="d-md-flex flex-row bg-bleu-tres-clair mb-2">

        <div class="col-md-6 border-left">

          <p class="lead"><i class="fas fa-hand-point-right"></i> @lang($qui_quand->prefixe.'qui_prelever')</p>

          <p>@lang($qui_quand->prefixe.$element."qui")</p>

        </div>


        <div class="col-md-6 border-left">

          <p class="lead"><i class="fas fa-calendar-alt"></i> @lang($qui_quand->prefixe.'quand_prelever')</p>

          <p>@lang($qui_quand->prefixe.$element."quand")</p>

        </div>

      </div>

    </div>

  @endforeach

</div>

{{-- recommandation pour le véto --}}
<div id="penser_veto" class="media border p-3 mb-2  bg-rouge-clair" style="display:none">
  <img class="mr-3 d-none d-md-block" src="{!! url('storage/img/icones/veto.svg') !!}" alt="veto.svg">
  <div class="media-body">
    <h4 class="mt-0">
      @lang('qui_quand.veto.titre')
    </h4>
    <p class="lead">@lang('qui_quand.veto.soustitre')</p>

  </div>

</div>
