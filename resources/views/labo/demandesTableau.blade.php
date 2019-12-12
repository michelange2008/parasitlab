<!-- FRAGMENT AFFICHANT UN TABLEAU DES DEMANDES D'ANALYSES
VARIABLES: intitulesDemandes (liste des colonnes), demandes (liste des lignes) -->
<table
  id="table"
  data-toggle = "table"
  data-locale = "fr-FR"
  data-sort-name = "reception"
  data-sort-order = "desc"
  data-toolbar = "#toolbar"
  data-show-button-icon = "true"
  data-show-pagination-switch="true"
  data-pagination="true"
  data-pagination-v-align = "top"
  data-page-list="[10, 25, 50, 100, 200, All]"
  data-page-size="25"
  data-search-accent-neutralise="true"
  data-search="true"
  data-show-columns="true"
  data-show-toggle="true"
  data-show-fullscreen="true"
  data-show-search-clear-button="true"
  >

  <thead class="alert-bleu-tres-fonce">
    <tr>
      @foreach ($intitulesDemandes as $intitule)
        <th class="align-middle text-center" data-field="{{ $intitule->id }}" data-sortable="{{ $intitule->sortable}}">{{$intitule->nom}}</th>
      @endforeach
    </tr>
  </thead>
  <tbody>
    @foreach ($demandes as $demande)
      <tr>

        <td>

          @nomLien([
            'id' => $demande->user->id,
            'nom' => $demande->user->name,
            'route' => 'eleveurAdmin.show',
            'tooltip' => "Cliquer pour afficher les informations sur ".$demande->user->name,
          ])

        </td>

        <td class="text-left">

          @nomLien([
            'route' => 'demandes.show',
            'id' => $demande->id,
            'nom' => ucfirst($demande->anapack->nom)." (".$demande->nb_prelevement." prélèv.)",
            'tooltip' => "Cliquer pour afficher la demande d'analyse"
          ])
          </td>

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

        <td class="text-center
          @if ($demande->acheve)
            bg-bleu-tres-clair
          @else
            bg-rouge-tres-clair
          @endif">
            @ouinon(['condition' => $demande->acheve])
        </td>

        <td class="text-center">
          @nomLien([
            'id' => $demande->facture->id,
            'nom' => "n°".$demande->facture->id,
            'route' => 'home',
            'tooltip' => "Afficher la facture"
          ])
        </td>

        <td class="text-center">
          @supprLigne(['id' => $demande->id, 'route' => 'demandes.destroy'])
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
