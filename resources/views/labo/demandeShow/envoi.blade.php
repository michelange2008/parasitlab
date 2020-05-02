{{-- les attributs demande et destinataire sont des informations destinées à la fonction ajax dans envoi.js --}}

{{-- CETTE LIGNE CI-DESSOUS SONT UNIQUEMENT DESTINEES A L'AFFICHAGE PAR JQUERY (envoi.js) --}}
{{-- <div id="a-envoyer-jq" demande="{{ $demande->id }}" destinataire="{{ $demande->user_id }}" type="all" class="btn btn-lg btn-rouge a-envoyer" style="display:none">@lang('boutons.send')</div>

<div id="envoye-jq" class="icone-cadre" title="@lang('boutons.demande_date_envoi', ['date_envoi' => $demande->date_envoi])" style="display:none" >

  <img class="img-40 d-block" src="{!! url('storage/img/icones/envoye.svg') !!}" alt="@lang('boutons.sent')">

</div> --}}

{{-- ######################################################################################### --}}

{{-- @if($demande->signe && $demande->date_envoi === null) --}}

  <div id="a-envoyer" demande="{{ $demande->id }}"
        destinataire="{{ $demande->user_id }}"
        type="all" class="btn btn-lg btn-rouge a-envoyer ml-3"
        style="display:none">
    @lang('boutons.send')
  </div>

{{-- @elseif ($demande->signe && $demande->date_envoi !== null) --}}

  <div id="envoye" class="icone-cadre" title="@lang('tooltips.envoi_fait', ['date_envoi' => \Carbon\Carbon::parse($demande->date_envoi)->isoFormat('LL')])" style="display:none">

    <img class="img-40 d-block" src="{!! url('storage/img/icones/envoye.svg') !!}" alt="@lang('boutons.sent')">

  </div>

{{-- @endif --}}

{{-- PETITES BOULES QUI S'AGITENT LE TEMPS QUE LE MAIL S'ENVOIE --}}
<div id="envoi-spinner" style="display:none">

  <div class="d-flex justify-content-center align-items-center" style="position:fixed; left:50vw; top:35vh; z-index:10000">

    <div class="spinner-grow" style="width: 0.5rem; height: 0.5rem;" role="status"></div>
    <div class="spinner-grow color-rouge-fonce" style="width: 1rem; height: 1rem;" role="status"></div>
    <div class="spinner-grow" style="width: 2rem; height: 2rem;" role="status"></div>
    <div class="spinner-grow color-rouge-fonce" style="width: 3rem; height: 3rem;" role="status"></div>
    <div class="spinner-grow" style="width: 5rem; height: 5rem;" role="status"></div>
    <div class="spinner-grow color-rouge-fonce" style="width: 3rem; height: 3rem;" role="status"></div>
    <div class="spinner-grow" style="width: 2rem; height: 2rem;" role="status"></div>
    <div class="spinner-grow color-rouge-fonce" style="width: 1rem; height: 1rem;" role="status"></div>
    <div class="spinner-grow" style="width: 0.5rem; height: 0.5rem;" role="status"></div>

  </div>

</div>
