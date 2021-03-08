<div class="d-flex mb-1">

  @if (!$demande->acheve)

    <img class="img-40 d-block"
    src="{{ url('storage/img/icones/saisie_non_faite.svg')}}"
    alt="saisie"
    title="@lang('boutons.saisie_encours') ">

    @else

      <img class="img-40 d-block"
      src="{{ url('storage/img/icones/saisie_cloturee.svg')}}"
      alt="saisie"
      title="@lang('boutons.saisie_faite') ">

      @if ($demande->signe)

        <img class="img-40 d-block"
        src="{{ url('storage/img/icones/saisie_signee.svg')}}"
        alt="saisie"
        title="@lang('boutons.saisie_signee') ">

        @if ($demande->envoye)

          <img class="img-40 d-block"
          src="{{ url('storage/img/icones/saisie_envoyee.svg')}}"
          alt="saisie"
          title="@lang('boutons.saisie_envoyee') ">

        @endif

      @endif

  @endif

</div>
