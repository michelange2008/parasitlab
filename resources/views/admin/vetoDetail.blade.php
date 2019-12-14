@isset($user)

  <div class="card">
    <div class="card-header alert-rouge-tres-fonce d-inline-flex">
      <h5 class="card-title mr-3">{{ $user->name }} </h5>
      <p class="text-truncate" data-toggle="tooltip" title="{{ $user->veto->num }}">( ede n° {{ $user->veto->num }} )</p>
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item d-inline-flex text-truncate data-toggle="tooltip" title="{{ $user->email }}">
        <i class="material-icons mr-3">mail</i>
        {{ $user->email }}
      </li>

      <li class="list-group-item d-inline-flex">
        <i class="material-icons mr-3">phone</i>
        @if ($user->veto->indicatif !== "33")
          <span class="mr-3">({{ $user->veto->indicatif }})</span>
        @endif
        {{ $user->veto->tel }}
      </li>

      <li class="list-group-item">
        <i class="material-icons mr-3">home</i>
        <p class="ml-1">{{ $user->veto->address_1 }}</p>
        <p class="ml-1">{{ $user->veto->adress_2 }}</p>
        <p class="ml-1">{{ $user->veto->cp }} {{ $user->veto->commune }}</p>
        @if ($user->veto->pays !== "France")
          <p class="ml-1">{{ $user->veto->pays }}</p>
        @endif
      </li>


      @isset($vetoInfos->nbDemandes)
        <li class="list-group-item">
          Total des demandes d'analyses <span class="badge badge-success ml-3">{{ $vetoInfos->nbDemandes }}</span>
        </li>
      @endisset


    </ul>

    <div class="card-footer">
      @include('fragments.boutonUser', [
        'route' => 'vetoAdmin.edit',
        'id' => $user->id,
        'intitule' => 'Voir/modifier',
        'couleur' => 'btn-bleu',
        ])
    </div>
  </div>

@endisset
