@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-md-10 col-lg-8">

        @titre(['titre' => __('titres.factures'), 'icone' => 'factures.svg'])

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col--md-10 col-lg-8">

        <table class="table table-hovered">

          <thead>
            <tr>
              <th></th>
              <th>@lang('tableaux.nom_client')</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)

              <tr>
                <td>
                  <a  style="width:50px" class="btn btn-bleu btn-sm" href="{{ route('factures.createFromUser', $user->id) }}"
                    data-toggle="tooltip" title="@lang('tooltips.create_facture')">
                    <i class="fas fa-euro-sign"></i>
                  </a>
                </td>
                <td>{{ $user->name }}</td>
              </tr>

            @endforeach
          </tbody>

        </table>

        <div class="my-3 text-right">

          @retour(['route' => 'factures.index'])

        </div>

      </div>

    </div>

  </div>

@endsection
