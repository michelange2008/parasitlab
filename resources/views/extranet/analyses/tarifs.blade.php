@extends('layouts.app')

@extends('extranet.menuExtranet')

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-md-10 col-lg-8">

        @titre(['titre' => __('titres.tarifs').' '.$date, 'icone' => 'factures.svg'])

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-10 col-lg-8">

        <p class="mx-3 mb-1">{!! __('tarifs.explication').$date !!}</p>

        <p class="mx-3">{!! __('tarifs.especes') !!}</p>

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-10 col-lg-8">

        <table class="table table-bordered table-hover">

          <thead>
            <tr>
              <td></td>
              <td></td>
              <td class="text-right">{!! __('tarifs.montants') !!}</td>
            </tr>
          </thead>

          @foreach ($anatypes as $anatype)

            <tr class="alert-bleu-tres-fonce">
              <td colspan="3">{{ ucfirst($anatype->nom) }}</td>
            </tr>

            @foreach ($anaactes as $anaacte)

              @if ($anaacte->anatype_id === $anatype->id)

                <tr>
                  <td class="border-0"></td>
                  <td>{{ ucfirst($anaacte->nom) }}</td>
                  <td class="text-right">{{ $anaacte->pu_ht }}</td>
                </tr>

              @endif

            @endforeach

          @endforeach

        </table>

        <p class="text-right blockquote-footer">{!! __('tarifs.tva') !!}</p>

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-10 col-lg-8">

        @bouton([
          'type' => 'route',
          'couleur' => 'btn-bleu',
          'route' => 'analyses.tarifsPdf',
          'intitule' => __('tarifs.telecharger_tarifs'),
          'fa' => 'fas fa-file-pdf',
        ])

        @include('fragments.boutonAnnule')

      </div>

    </div>

    <div class="row my-4">

    </div>

  </div>

@endsection
