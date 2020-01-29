@if (auth()->user()->labo->est_signataire && !$demande->signe)

    <a id="a-signer" attribut="{{ $demande->id }}" class="mx-3 btn btn-lg btn-rouge" href="{{ route('demande.signer', $demande->id )}}">Signer</a>

    <div id="signe-jq" style="display:none" class="icone-cadre mx-3">

      <img class="img-40 d-block" src="{!! asset('storage/img/icones/signature.svg') !!}" alt="signé" title="Cette demande a été signée le {{ $demande->date_signature }}">

    </div>


@endif

@if ($demande->signe)

  <div class="icone-cadre mx-3" title="Cette demande a été signée le {{ $demande->date_signature }}">

    <img class="img-40 d-block" src="{!! asset('storage/img/icones/signature.svg') !!}" alt="signé">

  </div>

@endif
