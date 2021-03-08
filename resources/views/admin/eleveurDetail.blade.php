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

      @boutonUser([
        'route' => 'eleveurAdmin.edit',
        'id' => $user->id,
        'intitule' => 'voirmodif',
        'couleur' => 'btn-bleu',
        ])

        @include('fragments.boutonSupprimerUser', ['id' => $user->id])

    </div>

  </div>

@endisset
