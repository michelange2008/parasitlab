<div class="card">

  <div class="card-body">

    <h4>{{ __('veterinaires.comment_faire') }}</h4>

    <p>{{ __('veterinaires.kit_envoi_1') }}</p>

    <p>{{ __('veterinaires.kit_envoi_2') }}</p>

    <p>{{ __('veterinaires.kit_envoi_3') }}</p>

  </div>

  <div class="card-footer">

    @bouton([
      'fa' => 'fas fa-at',
      "type" => "route",
      "route" => "express.envoikit",
      "intitule" => "form.ask_for_pack",
    ])

  </div>

</div>
