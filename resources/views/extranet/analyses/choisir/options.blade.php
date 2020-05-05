<div id="liste_options">

  <div id="aucune_option" style="display:none">

    <p class="lead alert-warning p-3">@lang('choisir.aucune_analyse')</p>

  </div>

  @foreach ($qui_quand->contenu as $key => $element) {{-- on boucle sur le json qui_quand.json qui renvoie au fichier de langue qui_quand.php --}}

    <div id="{{ $key }}" class="option" style="display:none">

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

<h4 id="une" class="titre_analyses" class="mb-3"  style="display:none">@lang('choisir.analyse_prop_une')</h4>
<h4 id="deux" class="titre_analyses" class="mb-3"  style="display:none">@lang('choisir.analyse_prop_deux')</h4>


<div id="listes analyse">

  @foreach ($anaactes as $anaacte)

    <div id="anaacte_{{ $anaacte->id }}" class="anaacte card mb-3" style="display:none" >
      <div class="row no-gutters">
        <div class="col-md-2 m-auto">
          <img src="{{  url('storage/img/icones'.'/'.$anaacte->anatype->icone->nom) }}" class="card-img img-65"  alt="{{ $anaacte->anatype->icone }}">
        </div>
        <div class="col-md-10">
          <div class="card-body">
            <h5 class="card-title">{!! ucfirst($anaacte->anatype->nom) !!}</h5>
            <p class="card-text">{!! ucfirst($anaacte->nom) !!}
              <span class="card-text"><small class="text-muted">{!! ucfirst($anaacte->pu_ht) !!}&nbsp;&euro;</small></span>
            </p>
            <p class="card-text text-secondary pl-3 bordure-epaisse">{!! ucfirst($anaacte->description) !!}</p>
            <p class="text-muted">@lang('choisir.num_analyse')&nbsp;<span class="badge badge-bleu-tres-fonce">{!! $anaacte->num !!}</span></p>
          </div>
        </div>
      </div>
    </div>

  @endforeach

  <div id="boutons" class="mb-3" style="display:none">
    <a id="bouton_pdf" class="btn btn-rouge" href="{{ url('storage/pdf/formulaire_espece.pdf') }}" target="_blank" ><i class="fas fa-file-pdf"></i>&nbsp;@lang('boutons.tele_form')</a>
    <a id="bouton_pdf" class="btn btn-bleu" href="{{ route('analyses.enpratique') }}"><i class="fas fa-virus"></i>&nbsp;@lang('boutons.prelevenvoi')</a>
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

</div>
