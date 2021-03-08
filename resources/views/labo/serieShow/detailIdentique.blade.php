<ul class="list-group list-group-horizontal-md">

  <li class="list-group-item">@lang('demandes.lots_identiques')</li>

  <li class="list-group-item">@lang('commun.ilya') {{ $serie->demandes[0]->prelevements->count()}} @lang('demandes.lots_chaque_fois') (
    @foreach ($serie->demandes[0]->prelevements as $prelevement)
      @if ($loop->first)
        {{ $prelevement->identification }}
      @elseif ($loop->last)
        @lang('commun.et') {{ $prelevement->identification }}
      @else
        , {{ $prelevement->identification }}
      @endif
    @endforeach
    )

  </li>

</ul>

<table class="my-3 table table-hover table-bordered">

  <thead>

    <tr>

      @foreach ($serieInfos->serieTableau->titres as $titre)

        <th class="text-center">
          @if($titre['demande_id'] == null)
            {{ $titre['intitule'] }}
          @else
            @nomLien([
              'nom' => $titre['intitule'],
              'id' => $titre['demande_id'],
              'route' => 'routeurDemande', // route qui sert à trier le type d'utilisateur
              'tooltip' => 'tooltips.affiche_demande',
            ])
          @endif

        </th>

      @endforeach

    </tr>

  </thead>

  <tbody>

    @foreach ($serieInfos->serieTableau->valeurs as $valeur)

      <tr>

        @foreach ($valeur as $value)
          @if ($valeur[1] === "")
            <td class="bg-bleu text-white"><strong>{{ $value }}</strong></td>
          @else
            @if ($value !== $valeur[0])
              <td class="text-center">{{ $value }}</td>
            @else
              <td>{{ $value }}</td>
            @endif
          @endif
        @endforeach

      </tr>

    @endforeach

  </tbody>

</table>
