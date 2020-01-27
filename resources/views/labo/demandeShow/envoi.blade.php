<a id="a-envoyer-jq" attribut="{{ $demande->id }}" class="btn btn-lg btn-rouge a-envoyer" style="display:none" href="{{ route('demande.envoyer', $demande->id )}}">Envoyer</a>

<div id="envoye-jq" class="icone-cadre" title="Cette demande a été envoyée le {{ $demande->date_envoi }}" style="display:none" >

  <img class="img-40 d-block" src="{!! asset('storage/img/icones/envoye.svg') !!}" alt="envoyé">

</div>

@if($demande->signe && $demande->date_envoi === null)

  <a attribut="{{ $demande->id }}" class="btn btn-lg btn-rouge a-envoyer" href="{{ route('demande.envoyer', $demande->id )}}">Envoyer</a>

@elseif ($demande->signe && $demande->date_envoi !== null)

  <div class="icone-cadre" title="Cette demande a été envoyée le {{ $demande->date_envoi }}">

    <img class="img-40 d-block" src="{!! asset('storage/img/icones/envoye.svg') !!}" alt="envoyé">

  </div>

@endif
