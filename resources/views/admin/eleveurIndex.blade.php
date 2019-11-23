@extends('layouts.app')

@extends('labo.laboMenu')

@section('content')

  <div class="container-fluid">
    <div class="row my-3 justify-content-center">
      <div class="col-md-11 alert alert-bleu d-inline-flex">
        <img src="{{ asset('storage/img/icones/eleveur.svg') }}" class="img-50" alt="Eleveur">
        <h3 class="mx-3 my-auto">Liste des éleveurs</h3>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-11">
        <table id="table-eleveurs" class="table table-hover">
          <thead class="alert-bleu-tres-fonce">
            <tr>
              @foreach ($intitules as $intitule) <!-- issu de tableauEleveurs.json -->
                <th class="align-middle">{{ $intitule }}</th>
              @endforeach
            </tr>
          </thead>
          <tbody>
            @foreach ($eleveurs as $eleveur)
              <tr>
                <td>{{ $eleveur->user->name }}</td>
                <td>
                  @include('fragments.voir', ['id' => $eleveur->user->id, 'route' => 'eleveurAdmin.show'])
                </td>
                <td>{{ $eleveur->user->email}}</td>
                <td>{{ $eleveur->ede }}</td>
                <td>{{ $eleveur->cp }}</td>
                <td>{{ $eleveur->commune }}</td>
                <td>{{ $eleveur->tel }}</td>
                <td>{{ $eleveur->veto->user->name }}</td>
                <td>
                  @include('fragments.supprLigne', ['id' => $eleveur->user->id, 'route' => "user.destroy"])
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

    </div>
  </div>

@endsection
