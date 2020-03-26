@extends('layouts.app')

@extends('extranet.menuExtranet')

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-md-10">

        @titre(["titre" => __($contenu->titre), "icone" => "veto.svg"])

      </div>

    </div>

    @foreach ($contenu->blocs as $bloc)

      <div class="row my-4 justify-content-center">

        <div class="col-md-4">

          <img class="img-100" src="{{url('storage/img').'/'.$bloc->image->file}}" alt="{{ $bloc->image->alt }}" title="{{ $bloc->image->title }}">

        </div>

        <div class="col-md-6 lead align-self-start">

            <h3><em>{!! __($bloc->soustitre) !!}</em></h3>
            @foreach ($bloc->texte as $texte)

              <p>{{ __($texte) }}</p>

            @endforeach

        </div>

        <div class="col-md-10 mx-auto">

          <blockquote class="blockquote" style="font-size:1.1rem !important">

            <p class="mb-0"> {!! __('commun.know_more') !!}&nbsp;:</p>

            @foreach ($bloc->biblio as $biblio)

              <p class="blockquote-footer"><cite>{!! __($biblio) !!}</cite></p>

            @endforeach

          </blockquote>

        </div>

      </div>

    @endforeach


    <div class="row justify-content-center">

      <div class="col-md-10 custom-lead presentation_cadre">

        <p>
          <img class="img-40" src="storage/logo.svg" alt="Parasit'Lab">
          {{ __('veterinaires.pl_propose') }}: <span class="font-weight-bolder">{{ __('veterinaires.copro_f') }}</span>, <span class="font-weight-bolder">{{ __('veterinaires.baermann') }}</span>, ...
        </p>

        <p>{{ ucfirst(__('veterinaires.innov')) }} <span class="font-weight-bolder">{{ __('veterinaires.compte_haem') }}</span>.</p>

        <p>{{ __('veterinaires.analyse_series') }}: <span class="font-weight-bolder">{{ __('veterinaires.suivi') }}</span> {{ __('commun.et') }} <span class="font-weight-bolder">{{ __('veterinaires.resist') }}</span>.</p>

      </div>

      <div class="col-md-10 d-flex justify-content-around flex-wrap presentation_cadre p-c-dernier">

        @foreach ($anatypes as $anatype)

          <div data-toggle="tooltip" data-placement="top" title="{{ ucfirst($anatype->nom) }}">

            <img class="img-zoom"
            src="{!! 'storage/img/icones/'.$anatype->icone->nom !!}" alt="coproscopie">
          </div>

          <!-- Modal -->
          {{-- <div class="modal fade" id="anapack_{{ $anatype->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header alert-bleu-tres-fonce">
                  <h4 class="modal-title" id="exampleModalLabel">{{ ucfirst($anatype->nom) }}</h4>
                  <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  {{  $anatype->technique }}.
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-bleu" data-dismiss="modal">Fermer</button>
                </div>
              </div>
            </div>
          </div> --}}

        @endforeach

      </div>

    </div>

    <hr class="col-md-10 divider">

    <div class="row justify-content-center">


      <div class="col-md-10">

        <div class="card-deck">

          @include('extranet.commentfaireveto')


          @include('extranet.contact.contacteznousvetos')

        </div>

      </div>


    </div>

  </div>

@endsection
