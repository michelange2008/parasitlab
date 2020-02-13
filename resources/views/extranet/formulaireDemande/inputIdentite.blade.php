@if (Auth()->user() && Auth()->user()->usertype->code == "eleveur")

<div class="row my-3">

  @include('extranet.formulaireDemande.input', ['for' => 'nom', 'label' => 'Nom ou raison sociale', 'type' => 'text', 'value' => Auth()->user()->name, 'placeholder' => "Votre nom ou raison sociale"])

  @include('extranet.formulaireDemande.input', ['for' => 'email', 'label' => 'Adresse mail', 'type' => 'email', 'value' => Auth()->user()->email, 'placeholder' => "Votre adresse de courriel"])

</div>

<div class="row my-3">

  @include('extranet.formulaireDemande.input', ['for' => 'address_1', 'label' => 'Adresse', 'type' => 'text', 'value' => Auth()->user()->eleveur->address_1, 'placeholder' => "Adresse"])

  @include('extranet.formulaireDemande.input', ['for' => 'address-2', 'label' => "Complément d'adresse", 'type' => 'text', 'value' => Auth()->user()->eleveur->address_2, 'placeholder' => "Complément d'adresse"])


</div>

@else

  <div class="row my-3">

    @include('extranet.formulaireDemande.input', ['for' => 'nom', 'label' => 'Nom ou raison sociale', 'type' => 'text', 'placeholder' => "Votre nom ou raison sociale"])

    @include('extranet.formulaireDemande.input', ['for' => 'email', 'label' => 'Adresse mail', 'type' => 'email', 'placeholder' => "Votre adresse de courriel"])

  </div>

  <div class="row my-3">

    @include('extranet.formulaireDemande.input', ['for' => 'address_1', 'label' => 'Adresse', 'type' => 'text', 'placeholder' => "Adresse"])

    @include('extranet.formulaireDemande.input', ['for' => 'address-2', 'label' => "Complément d'adresse", 'type' => 'text', 'placeholder' => "Complément d'adresse"])

  </div>

@endif
