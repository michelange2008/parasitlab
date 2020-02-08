@extends('layouts.app')

@extends('extranet.menuExtranet')

@section('content')

  <div class="container-fluid">

    <div class="row my-4 justify-content-center">

      <div class="col-md-3">

        <img class="img-100 img-change" src="{!! asset('storage/img/ostertagia_2.jpg') !!}" alt="coproscopie">

      </div>

      <div class="col-md-5 lead align-middle">

          <p>{{ __('accueil.veterinaires_1') }}</p>
          <p>{{ __('accueil.veterinaires_2') }}</p>

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-8 lead">

        <p>
          <img class="img-40" src="{!! asset('storage/logo.svg') !!}" alt="Parasit'Lab">
          {{ __('accueil.pl_propose') }}: <mark>{{ __('accueil.copro_f') }}</mark>, <mark>{{ __('accueil.baermann') }}</mark>, ...
        </p>

        <p>{{ ucfirst(__('accueil.innov')) }} <mark>{{ __('accueil.compte_haem') }}</mark>.</p>

        <p>{{ __('accueil.analyse_series') }}: <mark>{{ __('accueil.suivi') }}</mark> {{ __('commun.et') }} <mark>{{ __('accueil.resist') }}</mark>.</p>

      </div>

    </div>

    <div class="row my-3 justify-content-center">

      <div class="col-md-8 d-flex justify-content-around flex-wrap">

        @foreach ($anapacks as $anapack)

          <div data-toggle="tooltip" data-placement="top" title="{{ ucfirst($anapack->nom) }}">

            <img class="btn img-zoom"
            src="{!! asset('storage/img/icones').'/'.$anapack->icone->nom !!}" alt="coproscopie"
            data-toggle="modal" data-target="#anapack_{{ $anapack->id }}" >
          </div>

          {{-- <div class="elements-infos">
            <h5>{{ $anapack->nom }}</h5>
            <p>{{  $anapack->detail }}</p>
          </div> --}}

          <!-- Modal -->
          <div class="modal fade" id="anapack_{{ $anapack->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="exampleModalLabel">{{ ucfirst($anapack->nom) }}</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  {{  $anapack->detail }}.
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-bleu" data-dismiss="modal">Fermer</button>
                </div>
              </div>
            </div>
          </div>

        @endforeach

      </div>

    </div>
    <hr class="col-md-8 divider">

    <div class="row justify-content-center">


      <div class="col-md-8">

        <div class="card-deck">

          <div class="card">

            <div class="card-body">

              <h4>Comment faire ?</h4>

              <p>{{ __('accueil.kit_envoi') }}.</p>

            </div>

            <div class="card-footer">

              @include('fragments.bouton', ['type' => 'route', 'route' => 'enpratique', 'intitule' => 'En pratique', 'fa' => 'fas fa-sign-language'])

            </div>

          </div>

          <div class="card">

            <div class="card-body">

              <h4>Une question, une remarque ?</h4>

              <p>{{ __('accueil.repondre_questions') }}.</p>

            </div>

            <div class="card-footer">

              @include('fragments.boutonContact')

            </div>

          </div>

        </div>

      </div>


    </div>

  </div>

@endsection
