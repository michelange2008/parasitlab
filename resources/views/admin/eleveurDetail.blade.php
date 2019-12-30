@isset($user)

  <div class="card">

    @include('admin.detail.nomNum')

    <ul class="list-group list-group-flush">

      @include('admin.detail.contact')

      @include('admin.detail.vetoEleveur')

      @include('admin.detail.nbDemandes')

      @include('admin.detail.nbFacturesImpayees')

    </ul>

    <div class="card-footer d-inline-flex">

      @include('fragments.boutonUser', [
        'route' => 'eleveurAdmin.edit',
        'id' => $user->id,
        'intitule' => 'Voir/modifier',
        'couleur' => 'btn-bleu',
        ])

        @include('fragments.boutonSupprimer', ['id' => $user->id])

    </div>

  </div>

@endisset
