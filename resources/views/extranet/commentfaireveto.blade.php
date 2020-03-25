<div class="card">

  <div class="card-body">

    <h4>{{ __('veterinaires.comment_faire') }}</h4>

    <p>{{ __('accueil.kit_envoi') }}.</p>

  </div>

  <div class="card-footer">

    @include('fragments.bouton', ['type' => 'route', 'route' => 'enpratique', 'intitule' => 'En pratique', 'fa' => 'fas fa-sign-language'])

  </div>

</div>
