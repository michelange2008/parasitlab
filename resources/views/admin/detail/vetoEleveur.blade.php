@if ($personne->veto_id !== null)

  <li class="list-group-item d-inline-flex">

    <i class="material-icons mr-3">local_hospital</i>

    @nomLien([
      'route' => 'vetoAdmin.show',
      'id' => $personne->veto->user->id,
      'nom' => $personne->veto->user->name,
    ])

  </li>

@endif
