<div class="row my-3">

    <div class="col">

        @bouton([
            'type' => 'route',
            'route' => 'demandes.create',
            'intitule' => 'Nouvelle demande d\'analyse',
            'fa' => 'fas fa-microscope',
        ])

        @bouton([
            'type' => 'route',
            'route' => 'user.create',
            'intitule' => 'Nouvel utilisateur',
            'fa' => 'fas fa-user-plus',
        ])

    </div>
</div>

<div class="row my-4">

    <div class="col-lg-4">
        <div class="d-flex align-items-center bg-bleu-tres-clair p-2">
            <img class="img-40" src="{{ url('storage/img/icones/analyse.svg') }}" alt="">
            <h4 class="h4 mb-0 pl-1">Analyses en cours</h4>
        </div>
        <div>
            @foreach ($demandes_en_cours as $demande)
                <div class="d-flex p-3 border">
                    <div>
                        <img class="img-40" src="{{ url('storage/img/icones/' . $demande->espece->icone->nom) }}"
                            alt="">
                    </div>
                    <div class="pl-2">
                        <p class="mb-0">{{ $demande->user->name }}</p>
                        <p class="mb-0 color-bleu">
                            <a href="{{ route('demandes.show', $demande->id) }}">
                                {{ ucfirst($demande->anaacte->anatype->nom) }}
                                ({{ $prelevements->where('demande_id', $demande->id)->count() }} prlt.s)
                            </a>
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="col-lg-4">
        <div class="d-flex align-items-center bg-bleu-clair text-white p-2">
            <img class="img-40" src="{{ url('storage/img/icones/factures_clair.svg') }}" alt="">
            <h4 class="h4 mb-0 pl-1">Factures à établir</h4>
        </div>
        <div>
            @foreach ($factures_a_etablir as $user_name => $demandes)
                <div class="d-flex p-3 border">
                    <div class="pl-2">
                        <p class="mb-1 color-bleu">
                            <a href="{{ route('factures.createFromUser', $demandes[0]->user_id) }}">
                                {{ $user_name }}
                            </a>
                        </p>
                        @foreach ($demandes as $demande)
                            <p class="mb-0">
                                {{ ucfirst($demande->anaacte_nom) }}
                                {{ number_format(round($demande->pu_ht * (1 + $demande->tva), 2), 2, ',', ' ') }} €
                            </p>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="col-lg-4">
        <div class="d-flex align-items-center bg-rouge-tres-clair p-2">
            <img class="img-40" src="{{ url('storage/img/icones/cash.svg') }}" alt="">
            <h4 class="h4 mb-0 pl-1">Factures dues</h4>
        </div>
        <div>
            @foreach ($factures_dues as $facture)
                <div class="d-flex p-3 border">
                    <div class="pl-2">
                        <p class="mb-1">
                            {{ $user_name }}
                            <a href="{{ route('factures.show', $facture->id) }}">
                                <span class="color-bleu">n°{{ $facture->id}}</span>
                            </a>
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</div>
