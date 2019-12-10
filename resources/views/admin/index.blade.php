@extends('layouts.app')

@extends('labo.laboMenu')

@section('content')

  <div class="container-fluid">

    <div class="row mt-3 justify-content-center">

      <div class="col-md-11">

        @include('admin.indexTitre', ['usertype' => $users->userType, 'titre' => $users->titre])

      </div>

    </div>
    <div class="row justify-content-center">
      <div class="col-md-11">
        <table   id="table"
          data-toggle = "table"
          data-locale = "fr-FR"
          data-sort-name = "reception"
          data-sort-order = "desc"
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
              @foreach ($users->intitules as $intitule) <!-- issu de tableauEleveurs.json -->
                <th class="align-middle" data-field="{{ $intitule->id }}" data-sortable="{{ $intitule->sortable}}">{{ $intitule->nom }}</th>
              @endforeach
            </tr>
          </thead>
          <tbody>
            @foreach ($users->liste as $user)
              <tr>
                  @foreach ($user as $detail)
                    @if($detail->action === 'lien')
                      <td>
                        @nomLien([
                          'id' => $detail->id,
                          'nom' => $detail->nom,
                          'route' => $detail->route,
                        ])
                      </td>
                    @elseif($detail->action === 'del')
                      <td>
                        @supprLigne(['id' => $detail->id, 'route' => $detail->route])
                      </td>
                    @else
                      <td>
                        {{ $detail->nom }}
                      </td>
                    @endif
                  @endforeach
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

    </div>
  </div>

@endsection
