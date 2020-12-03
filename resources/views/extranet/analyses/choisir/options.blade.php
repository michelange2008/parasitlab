<div id="explication_observation" class="">

</div>

<div id="aucune_option" style="display:none">

  <p class="lead alert-warning p-3">@lang('choisir.aucune_analyse')</p>

</div>

<h4 id="une" class="titre_analyses" class="mb-3"  style="display:none">@lang('choisir.analyse_prop_une')</h4>
<h4 id="deux" class="titre_analyses" class="mb-3"  style="display:none">@lang('choisir.analyse_prop_deux')</h4>

<div id="listes analyse">

  @foreach ($anatypes as $anatype)

    <div id="anatype_{{ $anatype->id }}" class="anatype card my-3" keep="false" style="display:none" >
      <div class="row no-gutters">
        <div class="col-md-2 m-auto">
          <img src="{{  url('storage/img/icones'.'/'.$anatype->icone->nom) }}" class="card-img img-65"  alt="{{ $anatype->icone }}">
        </div>
        <div class="col-md-10">
          <div class="card-body">
            <h5 class="card-title">{!! ucfirst($anatype->nom) !!}</h5>
            @if ($anatype->remarque !== null)

              <p class="text-secondary"><i class="fas fa-exclamation-triangle"></i> {{ $anatype->remarque }}</p>
            @endif
            <button id="optionstarifs_{{ $anatype->id }}" class="optionstarifs btn btn-sm btn-secondary dropdown-toggle" state="closed">
              @lang('choisir.detail')
            </button>
          </div>
        </div>
        <div id="listeanaactes_{{ $anatype->id }}" class="listeanaactes" style="display:none">

          @foreach ($anatype->anaactes as $anaacte)

            <div id="anaacte_{{ $anaacte->id }}" class="anaacte ml-3 py-3 border-top border-bottom" style="display:none">

              <p class="card-text">{!! ucfirst($anaacte->nom) !!}
                <span class="card-text"><small class="text-muted">{!! ucfirst($anaacte->pu_ht) !!}&nbsp;&euro;&nbsp;HT</small></span>
              </p>
              <p class="card-text text-secondary pl-3 bordure-epaisse">{!! ucfirst($anaacte->description) !!}</p>
              <p class="text-muted">@lang('choisir.num_analyse')&nbsp;<span class="badge badge-bleu-tres-fonce">{!! $anaacte->num !!}</span></p>

            </div>

          @endforeach

        </div>
      </div>
    </div>

  @endforeach

  {{-- panneau d'info autres analyes si choix bovins --}}
  <div id="autres_analyses" class="media border p-3 mb-2 bg-warning" style="display:none">
    <img class="mr-3 d-none d-md-block" src="{!! url('storage/img/icones/interpreter.svg') !!}" alt="interpreter.svg">
    <div class="media-body">
      <p class="lead">@lang('options.autres_analyses')</p>
    </div>

  </div>

  <div id="boutons" class="mb-3" style="display:none">
    <a id="bouton_pdf" class="btn btn-rouge" href="{{ url('storage/pdf/formulaire_espece.pdf') }}" target="_blank" ><i class="fas fa-file-pdf"></i>&nbsp;@lang('boutons.tele_form')</a>
    <a id="bouton_pdf" class="btn btn-bleu" href="{{ route('analyses.enpratique') }}"><i class="fas fa-virus"></i>&nbsp;@lang('boutons.prelevenvoi')</a>
  </div>

  {{-- recommandation pour le véto --}}
  <div id="penser_veto" class="media border px-3 py-2 mb-2  bg-rouge-clair" style="display:none">
    <img class="mr-3 d-none d-md-block" src="{!! url('storage/img/icones/veto.svg') !!}" alt="veto.svg">
    <div class="media-body">
      <h5 class="mt-0">
        @lang('qui_quand.veto.titre')
      </h5>
      <p>@lang('qui_quand.veto.soustitre')</p>

    </div>

  </div>

</div>
