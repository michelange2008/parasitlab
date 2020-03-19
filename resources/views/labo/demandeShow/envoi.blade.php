{{-- les attribut et destinataire sont des informations destinées à la fonction ajax dans envoi.js --}}

{{-- LES DEUX LIGNES CI-DESSOUS SONT UNIQUEMENT DESTINEES A L'AFFICHAGE PAR JQUERY (envoi.js) --}}

<div id="a-envoyer-jq" demande="{{ $demande->id }}" destinataire="{{ $demande->user_id }}" class="btn btn-lg btn-rouge a-envoyer" style="display:none">Envoyer</div>

<div id="envoye-jq" class="icone-cadre" title="Cette demande a été envoyée le {{ $demande->date_envoi }}" style="display:none" >

  <img class="img-40 d-block" src="storage/img/icones/envoye.svg" alt="envoyé">

</div>

{{-- ######################################################################################### --}}

@if($demande->signe && $demande->date_envoi === null)

  <div demande="{{ $demande->id }}" destinataire="{{ $demande->user_id }}" class="btn btn-lg btn-rouge a-envoyer">Envoyer</div>

@elseif ($demande->signe && $demande->date_envoi !== null)

  <div id="envoye" class="icone-cadre" title="Cette demande a été envoyée le {{ $demande->date_envoi }}">

    <img class="img-40 d-block" src="{{ url('storage/img/icones/envoye.svg') }}" alt="envoyé">

  </div>

@endif
