@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-md-10">

        @titre(['titre' => __('doc.titre')])

      </div>

    </div>

    <div class="row my-3 justify-content-center">

      <div class="card-deck">

        <div class="card" style="width:30vw">

          <div class="card-header">

            <img src="{{ url('storage/img/icones/phpDoc.png') }}" alt="phpDocumentor" style="max-width:100%">

          </div>

          <div class="card-body">

            <p class="card-text">@lang('doc.phpdoc-text')</p>

          </div>

          <div class="card-footer">

            <a class="btn btn-bleu" href="{{url('storage/doc/index.html')}}" target="_blank">
              <i class="fas fa-book-reader"></i>
              @lang('doc.lire')
            </a>

          </div>

          <div class="">

          </div>

        </div>

      </div>

    </div>

  </div>

@endsection
