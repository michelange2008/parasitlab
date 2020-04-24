@if (auth()->user()->labo->est_signataire)

    <a id="a-signer" attribut="{{ $demande->id }}"
          class="mx-3 btn btn-lg btn-rouge"
          href="{{ route('demande.signer', $demande->id )}}"
          style="display:none">

        @lang('boutons.signer')

    </a>

@endif

    <div id="signe" class="icone-cadre mx-3" style="display:none">

      <img class="img-40 d-block"
            src="{{ url('storage/img/icones/signature.svg')}}"
            alt="signé"
            title="@lang('tooltips.demande_signe', ['date_signature' => $demande->date_signature, 'signataire' => $demande->labo->user->name ?? '']) ">

    </div>
