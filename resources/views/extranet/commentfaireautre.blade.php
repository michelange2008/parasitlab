<div class="card">

  <div class="card-body">

    <h4>{{ __('accueil.en_pratique_resume') }}</h4>

    <p>{{ __('accueil.kit_envoi') }}.</p>

  </div>

  <div class="card-footer">

    @include('fragments.bouton', ['type' => 'route', 'route' => 'enpratique', 'intitule' => 'En pratique', 'fa' => 'fas fa-sign-language'])

  </div>

</div>
