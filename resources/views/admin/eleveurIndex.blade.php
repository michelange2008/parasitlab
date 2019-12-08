@extends('layouts.app')

@extends('labo.laboMenu')

@section('content')

  <div class="container-fluid">
    <div class="row mt-3 justify-content-center">
      <div class="col-md-11 alert alert-bleu d-inline-flex">
        <img src="{{ asset('storage/img/icones/eleveur.svg') }}" class="img-50" alt="Eleveur">
        <h3 class="mx-3 my-auto">Liste des éleveurs</h3>
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
              @foreach ($intitulesEleveurs as $intitule) <!-- issu de tableauEleveurs.json -->
                <th class="align-middle" data-field="{{ $intitule->id }}" data-sortable="{{ $intitule->sortable}}">{{ $intitule->nom }}</th>
              @endforeach
            </tr>
          </thead>
          <tbody>
            @foreach ($eleveurs as $eleveur)
              <tr>
                <td>
                  @nomLien([
                    'id' => $eleveur->user->id,
                    'nom' => $eleveur->user->name,
                    'route' => "eleveurAdmin.show",
                  ])
                </td>
                <td>{{ $eleveur->user->email}}</td>
                <td>{{ $eleveur->ede }}</td>
                <td>{{ $eleveur->cp }}</td>
                <td>{{ $eleveur->commune }}</td>
                <td>{{ $eleveur->tel }}</td>
                <td>{{ $eleveur->veto->user->name }}</td>
                <td>
                  @supprLigne(['id' => $eleveur->user->id, 'route' => "user.destroy"])
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

    </div>
  </div>

@endsection
