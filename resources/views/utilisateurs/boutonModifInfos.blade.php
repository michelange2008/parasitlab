<div class="my-3 text-right">

  @bouton([
    'type' => 'route',
    'route' => $route.'.show',
    'id' => auth()->user()->id,
    'intitule' => 'boutons.voirmodif_infos_perso',
    'fa' => 'fas fa-user-edit',
  ])

</div>
