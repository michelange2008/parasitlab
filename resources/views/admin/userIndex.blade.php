@extends('layouts.app')

@extends('labo.laboMenu')

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="alert alert-bleu col-md-10 d-flex align-items-center my-3 mx-auto">
        <img src="{{asset('storage/img/icones/users.svg')}}" class='img-50' alt="Utilisateurs">
        <h3 class="mx-3">Liste des Utilisateurs</h3>
      </div>
    </div>
    <div class="row">
      <div class="col-md-10 mx-auto">

            <table id="table-users" class="table hover">
              <thead class="alert-bleu-tres-fonce">
                <tr>
                  <th scope="col" class="">Nom</th>
                  <th scope="col" class="">Email</th>
                  <th scope="col" class="">Type</th>
                  <th scope="col" class="">Voir</th>
                  <th scope="col" class="">Supprimer</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
                  <tr>
                    <td>
                      <img class="img-25" src="{{asset('storage/img/icones/'.$user->usertype->icone->nom)}}" alt="">
                      <strong>{{ $user->name }}</strong>
                    </td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->usertype->nom }}</td>
                    <td class="">
                      <a href="#" class="text-success"><i class="material-icons">launch</i></a>
                    </td>
                    <td class="">
                      <a href="#" class="text-danger"><i class="material-icons">delete_outlined</i></a>
                    </td>
                  </tr>

                @endforeach
              </tbody>
            </table>
      </div>
    </div>

  </div>

@endsection
