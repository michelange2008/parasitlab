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
              @foreach ($intitules as $intitule)
                <th class="align-middle">{{ $intitule }}</th>
              @endforeach
            </tr>
          </thead>
          <tbody>
            @foreach ($eleveurs as $eleveur)
              <tr>
                <td>{{ $eleveur->user->name }}</td>
                <td>{{ $eleveur->user->email}}</td>
                <td>{{ $eleveur->ede }}</td>
                <td>{{ $eleveur->cp }}</td>
                <td>{{ $eleveur->commune }}</td>
                <td>{{ $eleveur->tel }}</td>
                <td>{{ $eleveur->veto->user->name }}</td>
                <td>
                  <a href="{{ route('eleveurAdmin.show', $eleveur->user->id ) }}"><i class="text-center text-success material-icons">launch</i></a>
                </td>
                <td>
                  <a href="{{ route('eleveurAdmin.destroy', $eleveur->user->id ) }}"><i class="text-center text-danger material-icons">delete_outlined</i></a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

    </div>
  </div>

@endsection
