@extends('layouts.app')

@extends('extranet.menuExtranet')

@section('content')

  <div class="container-fluid">

    @include('extranet.technique.parasitisme.sousmenuParasitisme')

    <div class="row justify-content-end my-3">

      <div class="col-md-9">

        @titre(['titre' => __('titres.parasitisme.titre'), "soustitre" => __('titres.parasitisme.soustitre'), "icone" => 'blog.svg'])

      </div>

    </div>

    <div class="row justify-content-end">

      <div class="col-md-9">

        @flash()

      </div>

      <div class="col-md-9">

          @if (auth()->user())

            <div class="mb-3">

              @include('fragments.boutonUser', ['route' => 'blog.create', 'intitule' => "Nouvel article"])

            </div>

          @endif

        <div class=" bg-bleu-tres-clair p-3">


          <p>
            @lang('parasitisme.presentation')<i class="fa fa-smile">.</i>
          </p>

        </div>

      </div>

    </div>

    <div class="row justify-content-end">

      <div class="col-md-9">

        @include('extranet.technique.blog.blogs')

      </div>

    </div>

  </div>

@endsection
