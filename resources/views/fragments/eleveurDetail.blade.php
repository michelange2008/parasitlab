@isset($user)

  <div class="card">
    <div class="card-header alert-rouge-tres-fonce">
      <h5 class="card-title mr-3">{{ $user->name }}
        <small>( ede n° {{ $user->eleveur->ede }} )</small></h5>
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item d-inline-flex">
        <i class="material-icons mr-3">mail</i>
        {{ $user->email }}
      </li>

      <li class="list-group-item d-inline-flex">
        <i class="material-icons mr-3">phone</i>
        @if ($user->eleveur->indicatif !== "33")
          <span class="mr-3">({{ $user->eleveur->indicatif }})</span>
        @endif
        {{ $user->eleveur->tel }}
      </li>

      <li class="list-group-item">
        <i class="material-icons mr-3">home</i>
        <p class="ml-1">{{ $user->eleveur->address_1 }}</p>
        <p class="ml-1">{{ $user->eleveur->adress_2 }}</p>
        <p class="ml-1">{{ $user->eleveur->cp }} {{ $user->eleveur->commune }}</p>
        @if ($user->eleveur->pays !== "France")
          <p class="ml-1">{{ $user->eleveur->pays }}</p>
        @endif
      </li>

      @if ($user->eleveur->veto_id !== 1)
        <li class="list-group-item d-inline-flex">
          <i class="material-icons mr-3">local_hospital</i>
          @nomLien([
            'route' => 'vetoAdmin.show',
            'id' => $user->eleveur->veto_id,
            'nom' => $user->eleveur->veto->user->name,
          ])
        </li>
      @endif

      @isset($eleveurInfos->nbDemandes)
        <li class="list-group-item">
          Total des demandes d'analyses <span class="badge badge-success ml-3">{{ $eleveurInfos->nbDemandes }}</span>
        </li>
      @endisset

      @isset($eleveurInfos->factureImpayees)
        @if ($eleveurInfos->factureImpayees > 0)
          <li class="list-group-item">
            Nombre de factures impayées <span class="badge badge-danger ml-3">{{ $eleveurInfos->factureImpayees }}</span>
          </li>
        @endif
      @endisset

    </ul>

    <div class="card-footer">
      @include('fragments.boutonUser', [
        'route' => 'eleveurAdmin.show',
        'id' => $user->id,
        'intitule' => 'Voir/modifier',
        'couleur' => 'btn-bleu',
        ])
    </div>
  </div>

@endisset
