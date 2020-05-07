@extends('layouts.app')

@section('menu')

  @include("extranet.menuExtranet")

@endsection

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

        <p>{{ ucfirst(__('veterinaires.innov')) }} <span class="font-weight-bolder">{!! __('veterinaires.compte_haem') !!}</span>.</p>

        <p>{{ __('veterinaires.analyse_series') }}: <span class="font-weight-bolder">{{ __('veterinaires.suivi') }}</span> {{ __('commun.et') }} <span class="font-weight-bolder">{{ __('veterinaires.resist') }}</span>.</p>

      </div>

      <div class="col-md-10 d-flex justify-content-around flex-wrap presentation_cadre p-c-dernier">

        @foreach ($anatypes as $anatype)

          <div data-toggle="tooltip" data-placement="top" title="{{ ucfirst(__($anatype->nom)) }}">

            <img class="img-zoom"
            src="{!! 'storage/img/icones/'.$anatype->icone->nom !!}" alt="coproscopie">
          </div>

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
