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
        <table class="table table-hover table-bordered">
            @foreach ($demandes_en_cours as $demande)
                <tr>
                    <td role="button">
                        <a href="{{ route('demandes.show', $demande->id) }}">
                            <div class="d-flex">
                                <div>
                                    <img class="img-40"
                                        src="{{ url('storage/img/icones/' . $demande->espece->icone->nom) }}"
                                        alt="">
                                </div>
                                <div class="pl-2">
                                    <p class="mb-0">{{ $demande->user->name }}</p>
                                    <p class="mb-0 color-bleu">
                                        {{ ucfirst($demande->anaacte->anatype->nom) }}
                                        <span title="Nombre de prélèvements">
                                            ({{ $prelevements->where('demande_id', $demande->id)->count() }})
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    <div class="col-lg-4">
        <div class="d-flex align-items-center bg-bleu-clair text-white p-2">
            <img class="img-40" src="{{ url('storage/img/icones/factures_clair.svg') }}" alt="">
            <h4 class="h4 mb-0 pl-1">Factures à établir</h4>
        </div>
        <table class="table table-hover">
            @foreach ($factures_a_etablir as $user_name => $demandes)
                <tr class="border" role="button">
                    <td class="pl-2">
                        <a href="{{ route('factures.createFromUser', $demandes[0]->user_id) }}">
                            <p class="mb-1">
                                {{ $user_name }}
                            </p>
                            @foreach ($demandes as $demande)
                                <p class="mb-0 color-bleu">
                                    {{ ucfirst($demande->anaacte_nom) }}
                                    {{ number_format(round($demande->pu_ht * (1 + $demande->tva), 2), 2, ',', ' ') }} €
                                </p>
                            @endforeach
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    <div class="col-lg-4">
        <div class="d-flex align-items-center bg-rouge-tres-clair p-2">
            <img class="img-40" src="{{ url('storage/img/icones/cash.svg') }}" alt="">
            <h4 class="h4 mb-0 pl-1">Factures dues</h4>
        </div>
        <table class="table table-hover table-bordered">
            @foreach ($factures_dues as $facture)
                <tr class="" role="button">
                    <td class="pl-2">
                        <a href="{{ route('factures.show', $facture->id) }}">
                            <p class="mb-1">{{ $user_name }}</p>

                            <p class="color-bleu">
                                facture n°{{ $facture->id }}:
                                <span class="font-weight-bold">{{ $facture->total_ttc }}</span>
                            </p>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

</div>
