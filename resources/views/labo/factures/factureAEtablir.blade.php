@extends('layouts.app')

@extends('labo.laboMenu')

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-md-10 col-lg-8">

        @titre(['titre' => "Factures à établir", 'icone' => 'factures.svg'])

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col--md-10 col-lg-8">

        <table class="table table-hovered">

          <thead>
            <tr>
              <th>Nom du client</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)

              <tr>
                <td>{{ $user->name }}</td>
                <td>
                  <a class="btn btn-bleu btn-sm" href="{{ route('factures.preCreate', $user->id) }}"
                    data-toggle="tooltip" title="cliquer pour créer la facture">
                    <i class="fas fa-euro-sign"></i>
                  </a>
                </td>
              </tr>

            @endforeach
          </tbody>

        </table>

      </div>

    </div>

  </div>

@endsection
