<div class="card">
  <div class="card-header alert-rouge-tres-fonce">
    <h5 class="card-title mr-3">{{ $demande->user->name }}
      <small>( ede n° {{ $demande->user->eleveur->ede }} )</small></h5>
  </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item d-inline-flex">
        <i class="material-icons mr-3">mail</i>
        {{ $demande->user->email }}
      </li>
      <li class="list-group-item d-inline-flex">
        <i class="material-icons mr-3">phone</i>
        @if ($demande->user->eleveur->indicatif !== "33")
          <span class="mr-3">({{ $demande->user->eleveur->indicatif }})</span>
        @endif
        {{ $demande->user->eleveur->tel }}
      </li>
      <li class="list-group-item">
        <i class="material-icons mr-3">home</i>
        <p class="ml-1">{{ $demande->user->eleveur->address_1 }}</p>
        <p class="ml-1">{{ $demande->user->eleveur->adress_2 }}</p>
        <p class="ml-1">{{ $demande->user->eleveur->cp }} {{ $demande->user->eleveur->commune }}</p>
        @if ($demande->user->eleveur->pays !== "France")
          <p class="ml-1">{{ $demande->user->eleveur->pays }}</p>
        @endif
      </li>
      @if ($demande->user->eleveur->veto_id !== 1)
        <li class="list-group-item d-inline-flex">
          <i class="material-icons mr-3">local_hospital</i>
          @include('fragments.nomLien', [
            'route' => 'vetoAdmin.show',
            'id' => $demande->user->eleveur->veto_id,
            'nom' => $demande->user->eleveur->veto->user->name,
          ])
        </li>
      @endif
      <li class="list-group-item">
        Total des demandes d'analyses <span class="badge badge-success ml-3">{{ $total_demandes }}</span>
      </li>
      @if ($nb_factures_impayees > 0)
        <li class="list-group-item">
          Nombre de factures impayées <span class="badge badge-danger ml-3">{{ $nb_factures_impayees }}</span>
        </li>
      @endif
    </ul>
    <div class="card-footer">
      @include('fragments.boutonUser', [
        'route' => 'eleveurAdmin.show',
        'id' => $demande->user->id,
        'intitule' => 'Voir/modifier',
        'couleur' => 'btn-bleu',
      ])
    </div>
</div>
