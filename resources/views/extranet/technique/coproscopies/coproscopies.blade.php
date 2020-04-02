@extends('layouts.app')

@extends('extranet.menuExtranet')

@section('content')

  <div class="container-fluid">

    @include('extranet.analyses.sousmenuAnalyses')

    <div class="row my-3 justify-content-end">

      <div class="col-md-10">

        @titre(['icone' => 'analyse.svg', 'titre' => __('titres.copros')])

      </div>

      @foreach ($coproscopies as $element)

        <div class="col-md-10 d-flex flex-row my-3">

          <div class="media">

            <img class="mr-3 d-none d-md-block shadow-lg " src="{!! url('storage/img/extranet/'.$element->image) !!}" alt="@lang($element->prefixe.'titre')">

            <div class="media-body">

              <h3 class="mt-2 text-secondary">@lang($element->prefixe.'titre')</h3>

              <p style="font-size:1.15rem" class="mb-1">@lang($element->prefixe.('texte_1'))</p>

              <p style="font-size:1.15rem" class="mb-1">@lang($element->prefixe.('texte_2'))</p>

              <p style="font-size:1.15rem" class="mb-1">@lang($element->prefixe.('texte_3'))</p>

            </div>

          </div>

        </div>

      @endforeach

  </div>

@endsection
