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

    <div class="col-md-6">

        @include('admin.dashboard.dashmain.dashdemandes', [
            'icone' => 'analyse.svg',
            'titre' => 'analyses_en_cours',
            'aucune' => '0_demande_en_cours',
            'demandes' => $demandes_en_cours,
        ])

        @include('admin.dashboard.dashmain.dashdemandes', [
            'icone' => 'signature.svg',
            'titre' => 'analyses_a_signer',
            'aucune' => '0_analyses_non_signes',
            'demandes' => $demandes_non_signees,
        ])

        @include('admin.dashboard.dashmain.dashdemandes', [
            'icone' => 'envoye.svg',
            'titre' => 'analyses_a_envoyer',
            'aucune' => '0_analyses_non_envoyees',
            'demandes' => $demandes_non_envoyees,
        ])

    </div>

    <div class="col-md-6">
        <div>

            <div class="d-flex align-items-center bg-bleu-clair text-white p-2">
                <img class="img-40" src="{{ url('storage/img/icones/factures_clair.svg') }}" alt="">
                <h4 class="h4 mb-0 pl-1">@lang('dashboard.factures_a_etablir')</h4>
            </div>
            @if ($factures_a_etablir->count() == 0)
                <p class="p-3 font-italic text-secondary">@lang('dashboard.0_facture_a_etablir')</p>
            @else
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
                                            {{ number_format(round($demande->pu_ht * (1 + $demande->tva), 2), 2, ',', ' ') }}
                                            €
                                        </p>
                                    @endforeach
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            @endif
        </div>

        <div class="">

            <div class="d-flex align-items-center bg-rouge-tres-clair p-2">
                <img class="img-40" src="{{ url('storage/img/icones/cash.svg') }}" alt="">
                <h4 class="h4 mb-0 pl-1">@lang('dashboard.factures_dues')</h4>
            </div>
            @if ($factures_dues->count() == 0)
                <p class="p-3 font-italic text-secondary">@lang('dashboard.0_facture_due')</p>
            @else
                <table class="table table-hover table-bordered">
                    @foreach ($factures_dues as $facture)
                        <tr class="" role="button">
                            <td class="pl-2">
                                <a href="{{ route('factures.show', $facture->id) }}">
                                    <p class="mb-1">{{ $facture->user->name }}</p>

                                    <p class="color-bleu">
                                        facture n°{{ $facture->id }}:
                                        <span class="font-weight-bold">{{ $facture->total_ttc }}</span>
                                    </p>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            @endif
        </div>
    </div>

</div>
