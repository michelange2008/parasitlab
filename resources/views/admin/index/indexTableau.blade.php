{{-- LE BOUTON QUI S AFFICHE DEPEND DU TYPE D UTILISATEUR: labo (ajouter une demande), Veto ou eleveur (nous contacter) --}}

  @include('admin.index.indexBouton')

{{-- SI IL N Y A AUCUNE DEMANDE D ANALYSE POUR CET ELEVEUR --}}
@if (count($datas->liste) === 0 && isset($zeroAnalyses))

<div class="row my-3">

  <div class="col-md-12">

    <h4 class="text-secondary">{{ $zeroAnalyses }}</h4>

  </div>

</div>

@else

<table   id="table"
  data-toggle = "table"
  data-locale = "fr-FR"
  data-sort-name = {{ $datas->intitules->tri->colonne }}
  data-sort-order = {{ $datas->intitules->tri->ordre }}
  data-toolbar = "#toolbar"
  data-show-button-icon = "true"
  data-show-pagination-switch="true"
  data-pagination="true"
  data-pagination-v-align = "both"
  data-page-list="[10, 25, 50, 100, 200, All]"
  data-page-size="25"
  data-search-accent-neutralise="true"
  data-search="true"
  data-show-columns="true"
  data-show-toggle="true"
  data-show-fullscreen="true"
  data-show-search-clear-button="true">
  <thead class="alert-bleu-tres-fonce">
    <tr>
      @foreach ($datas->intitules->liste as $intitule) <!-- issu de tableauEleveurs.json -->
        <th data-halign="{{ $intitule->align }}" data-align="{{ $intitule->align }}" data-field="{{ $intitule->id }}" data-sortable="{{ $intitule->sortable}}">{{ $intitule->nom }}</th>
      @endforeach
    </tr>
  </thead>
  <tbody>
    @foreach ($datas->liste as $user)
      <tr>
          @foreach ($user as $detail)

            @empty ($detail->action)

              <td>
                @isset($detail->nom)

                  {{ $detail->nom }}

                @endisset
              </td>

            @elseif($detail->action === 'lien')

              <td>
                @nomLien([
                  'id' => $detail->id,
                  'nom' => $detail->nom,
                  'route' => $detail->route,
                  'tooltip' => $detail->tooltip,
                ])
              </td>

            @elseif ($detail->action == "tableau")

              <td>
                {!! $detail !!}
              </td>

            @elseif($detail->action === 'del')

              <td>
                @supprLigne(['id' => $detail->id, 'route' => $detail->route])
              </td>

            @elseif ($detail->action === 'modifier')

              <td>
                @modifierLigne(['id' => $detail->id, 'route' => $detail->route])
              </td>

            @elseif ($detail->action === 'ouinon')

              <td>

                @ouinon(['condition' => $detail->nom])

              </td>

            @elseif ($detail->action === 'icone')

              <td>

                <img class="img-50" src="{{ 'storage/img/icones/'.$detail->nom }}" alt="{{ $detail->nom }}">

              </td>

            @elseif ($detail->action === 'photo')

              <td>

                <img class="img-50" src="{{ 'storage/img/labo/photos/'.$detail->nom }}" alt="{{ $detail->nom }}">

              </td>
            @endempty

          @endforeach
      </tr>
    @endforeach
  </tbody>
</table>

@endif
