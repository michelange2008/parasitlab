@extends('layouts.app')

@extends('extranet.menuExtranet')

@section('content')

  <div class="container-fluid">

    <div class="row my-3">

      <div class="col-md-12 col-lg-10 mx-auto">

        @titre(['icone' => 'analyse.svg', 'titre' => "Les examens coproscopiques"])

      </div>

      @foreach ($coproscopies as $element)

        <div class="col-md-12 col-lg-10 d-flex flex-row mx-auto my-3">

          <div class="media">

            <img class="mr-3" src="{!! asset('storage/img').'/'.$element->image !!}" alt="{!! $element->titre !!}">

            <div class="media-body">

              <h3 class="mt-0 text-secondary">{{ $element->titre }}</h3>

              @foreach ($element->texte as $texte)

                <p style="font-size:1.15rem" class="mb-1">{{ $texte }}</p>

              @endforeach

            </div>

          </div>

        </div>

      @endforeach

  </div>

@endsection
