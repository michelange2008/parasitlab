<!-- FRAGMENT AFFICHANT UN TABLEAU DES DEMANDES D'ANALYSES
VARIABLES: intitules (liste des colonnes), demandes (liste des lignes) -->

<table id="table-demandes" class="table hover">
  <thead class="alert-bleu-tres-fonce">
    <tr>
      @foreach ($intitules as $intitule)
        <th class="align-middle text-center">{{$intitule}}</th>
      @endforeach
    </tr>
  </thead>
  <tbody>
    @foreach ($demandes as $demande)
      <tr>
        <td>{{ $demande->anapack->nom}} (<strong>{{ $demande->nb_prelevement }} prélèv.</strong>)</td>

        <td class="text-center color-rouge-tres-fonce">
          @isset($demande->serie_id)
            @nomLien([
              'route' => 'serie.show',
              'id' => $demande->serie->id,
              'nom' => $demande->serie->id,
              'tooltip' => "Cliquer pour afficher la série complète"
            ])
          @endisset
        </td>

        <td class="text-center">

          @include('fragments.voir', ['id' => $demande->id, 'route' => 'demandes.show', 'tooltip'=> "Cliquer pour afficher le détail de la demande d'analyse",])

        </td>

        <td>

          @nomLien([
            'id' => $demande->user->id,
            'nom' => $demande->user->name,
            'route' => 'eleveurAdmin.show',
            'tooltip' => "Cliquer pour afficher les informations sur ".$demande->user->name,
          ])

        </td>

        <td class="text-center">

          <span class="d-none">{{$demande->espece->nom}}</span>

          <img class="img-40" src="{{ asset('storage/img/icones/'.$demande->espece->icone->nom) }}"
            alt="{{$demande->espece->nom}}"
            data-toggle="tooltip" data-placement="top"
            title="{{ $demande->espece->nom }}">

        </td>

        <td class="text-center">
          @if ($demande->toveto)
            @nomLien([
              'id' => $demande->veto->id,
              'nom' => $demande->veto->user->name,
              'route' => 'vetoAdmin.show',
              'tooltip'=> "Cliquer pour afficher les informations sur ".$demande->veto->user->name,
            ])
          @endif

        </td>
        <td class="text-center">
          @colonneDate(['date' => $demande->date_reception ])
        </td>
        <td class="text-center">
          @colonneDate(['date' => $demande->date_resultat ])
        </td>
        <td class="text-center">
          @colonneDate(['date' => $demande->date_envoi ])
        </td>
        <td>{{ $demande->informations }}</td>
        <td class="text-center">
          <a href="#" class="btn btn-sm btn-bleu rounded-0">{{ $demande->facture->id }} <i class="material-icons">zoom_in</i></a>
        </td>
        <td class="text-center">
          @supprLigne(['id' => $demande->id, 'route' => 'demandes.destroy'])
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
