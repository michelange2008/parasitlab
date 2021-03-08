@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-md-11">

        @include('fragments.flash')

      </div>

    </div>

    <div class="row justify-content-center my-3">

      <div class="col-lg-8">

        @titre(['titre' => __('titres.list_typeprod'), 'icone' => 'typeprod.svg'])

      </div>

    </div>

    <div class="row">

      <div class="col-lg-8 offset-lg-2">

        <table class="table">

          <thead class="alert-bleu-tres-fonce">

            <tr>

              <td>@lang('tableaux.nom')</td>

              <td>@lang('tableaux.espece')</td>

              <td>@lang('form.addmodif')</td>

              <td>@lang('form.suppr')</td>

            </tr>

          </thead>

          <tbody>

            <tr>
              <form id="add_typeprod" class="" action="{{ route('typeprod.store') }}" method="post">

                @csrf

                <td><input class="form-control" type="text" name="nom" placeholder="Nom"></td>

                <td>@inputEspece()</td>

                <td class="text-center">

                  <button class="btn" type="submit"><i class="fas fa-plus-circle text-success"></i></button>

                </td>

              </form>

            </tr>

            @foreach ($typeprods as $typeprod)

              <form id="typeprod_edit_.{{ $typeprod->id }}" class="" action="{{ route('typeprod.update', $typeprod->id) }}" method="post">

                @csrf
                @method('patch')

                <tr>

                  <td><input class="form-control-plaintext" type="text" name="nom" value="{{ $typeprod->nom }}"></td>

                  <td>

                    @inputEspece(['espece_id_anterieure' => $typeprod->espece->id])

                  <td class="text-center">

                    <button class="btn" type="submit"><i class="fas fa-edit text-secondary"></i></button>

                  </td>

                </form>

                <td>

                  @supprLigne([
                    'id' => $typeprod->id,
                    'route' => 'typeprod.destroy',
                    'titre' => 'form.suppr',
                    'texte' => 'form.del'
                  ])

                </td>

              </tr>

            @endforeach

          </tbody>

        </table>

      </div>

    </div>

    <div class="row">

      <div class="col-lg-8 offset-lg-2">

        @retour()

      </div>

    </div>

  </div>

@endsection
