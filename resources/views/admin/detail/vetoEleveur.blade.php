@if ($personne->veto_id !== 1)
  <li class="list-group-item d-inline-flex">
    <i class="material-icons mr-3">local_hospital</i>
    @nomLien([
      'route' => 'vetoAdmin.show',
      'id' => $personne->veto_id,
      'nom' => $personne->veto->user->name,
    ])
  </li>
@endif
