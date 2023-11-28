<li class="list-group-item">

    @boutonUser([
        'route' => 'acteToUser.add',
        'id' => $user,
        'fa' => 'fas fa-plus-square',
        'intitule' => 'add_acte',
    ])

    @boutonUser([
        'couleur' => 'btn-secondary',
        'route' => 'acte.indexActesUser',
        'id' => $user,
        'fa' => 'fas fa-list',
        'intitule' => 'liste_actes',
    ])

</li>
