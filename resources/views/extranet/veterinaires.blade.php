@extends('layouts.app')

@extends('extranet.menuExtranet')

@section('content')

  <div class="container-fluid">

    <div class="row my-4 justify-content-center">

      <div class="col-md-3">

        <img class="img-100 img-change" src="'storage/img/ostertagia_2.jpg" alt="coproscopie">

      </div>



      <div class="col-md-5 lead align-self-center">

          <h3><em>Vétérinaires...</em></h3>

          <p>{{ __('accueil.veterinaires_1') }}</p>
          <p>{{ __('accueil.veterinaires_2') }}</p>

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-8 custom-lead presentation_cadre">

        <p>
          <img class="img-40" src="storage/logo.svg" alt="Parasit'Lab">
          {{ __('accueil.pl_propose') }}: <span class="font-weight-bolder">{{ __('accueil.copro_f') }}</span>, <span class="font-weight-bolder">{{ __('accueil.baermann') }}</span>, ...
        </p>

        <p>{{ ucfirst(__('accueil.innov')) }} <span class="font-weight-bolder">{{ __('accueil.compte_haem') }}</span>.</p>

        <p>{{ __('accueil.analyse_series') }}: <span class="font-weight-bolder">{{ __('accueil.suivi') }}</span> {{ __('commun.et') }} <span class="font-weight-bolder">{{ __('accueil.resist') }}</span>.</p>

      </div>

      <div class="col-md-8 d-flex justify-content-around flex-wrap presentation_cadre p-c-dernier">

        @foreach ($anapacks as $anapack)

          <div data-toggle="tooltip" data-placement="top" title="{{ ucfirst($anapack->nom) }}">

            <img class="btn img-zoom"
            src="{!! 'storage/img/icones/'.$anapack->icone->nom !!}" alt="coproscopie"
            data-toggle="modal" data-target="#anapack_{{ $anapack->id }}" >
          </div>

          <!-- Modal -->
          <div class="modal fade" id="anapack_{{ $anapack->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header alert-bleu-tres-fonce">
                  <h4 class="modal-title" id="exampleModalLabel">{{ ucfirst($anapack->nom) }}</h4>
                  <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
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

              <h4>{{ __('accueil.comment_faire') }}</h4>

              <p>{{ __('accueil.kit_envoi') }}.</p>

            </div>

            <div class="card-footer">

              @include('fragments.bouton', ['type' => 'route', 'route' => 'enpratique', 'intitule' => 'En pratique', 'fa' => 'fas fa-sign-language'])

            </div>

          </div>

          <div class="card">

            <div class="card-body">

              <h4>{{ __('accueil.question_remarque') }}</h4>

              <p>{{ __('accueil.repondre_questions') }}</p>

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
