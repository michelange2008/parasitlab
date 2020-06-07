@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-ld-11 col-lg-1à col-xl-9">

        @titre(['titre' => $option->nom, 'icone' => 'why.svg'])

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-11 col-lg-10 col-xl-9">

        <img class="p-3 img-thumbnail" src="{{ url('storage/img/algorithme/'.$option->icone) }}" alt="{{ $option->icone }}">
        <div class="row">

          <div class="col-md-6 border-bottom mb-3">
            <p class="text-secondary">@lang('options.titre')</p>
            <p class="ml-3 font-weight-bold">{{ $option->titre }}</p>
          </div>

          <div class="col-md-6 border-left border-bottom mb-3">
            <p class="text-secondary">@lang('options.soustitre')</p>
            <p class="ml-3 font-weight-bold">{{ ucfirst($option->soustitre) }}</p>
          </div>

          <div class="col-md-6">
            <p class="text-secondary">@lang('options.qui_prelever')</p>
            <p class="ml-3 font-weight-bold">{!! ucfirst($option->qui) !!}</p>
          </div>

          <div class="col-md-6 border-left">
            <p class="text-secondary">@lang('options.quand_prelever')</p>
            <p class="ml-3 font-weight-bold">{!! ucfirst($option->quand) !!}</p>
          </div>
        </div>

        @boutonUser(['route' => 'options.edit', 'id' => $option->id, 'couleur' => 'btn-bleu', 'fa' => 'fas fa-edit', 'intitule' => 'modifier'])


      </div>

    </div>

    <div class="row my-3 justify-content-center">

      <div class="col-md-11 col-lg-10 col-xl-9">

        <table class="table table-striped">

          <tbody>

            @foreach ($option->anaactes as $anaacte)

              <tr>

                <td>{{ucfirst( $anaacte->anatype->nom) }}</td>

                <td>{{ ucfirst($anaacte->nom) }}</td>

              </tr>

            @endforeach

          </tbody>

        </table>

        @boutonUser(['route' => 'option.editAnaacte', 'id' => $option->id, 'couleur' => 'btn-bleu', 'fa' => 'fas fa-edit', 'intitule' => 'modifier'])


      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-11 col-lg-10 col-xl-9">

        @retour(['route' => 'options.index'])

      </div>

    </div>

  </div>

@endsection
