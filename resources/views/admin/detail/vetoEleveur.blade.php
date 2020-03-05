@if ($personne->veto_id !== null)

  <li class="list-group-item d-inline-flex">

    <i class="fas fa-user-md mr-3"></i>

    @nomLien([
      'route' => 'vetoAdmin.show',
      'id' => $personne->veto->user->id,
      'nom' => $personne->veto->user->name,
    ])

  </li>

@endif
