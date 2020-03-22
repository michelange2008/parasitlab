@extends('layouts.app')

@extends('extranet.menuExtranet')

@section('content')

  <div class="container-fluid">

    @include('extranet.technique.parasitisme.sousmenuParasitisme')

    <div class="row justify-content-end my-3">

      <div class="col-md-9">

        @titre(['titre' => "Parasit'Lab Infos&nbsp;:", "soustitre" => "Des réponses à vos questions sur la parasitisme", "icone" => 'blog.svg'])

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
            Cette page est destinée à vous permettre d'approfondir vos connaissances sur le parasitisme.
            Elle n'est pas une encyclopédie de parasitologie, mais elle s'attache à répondre aux questions que vous vous posez le plus souvent.
            N'hésitez donc pas à nous interroger par mail si certaines interrogations sur le parasitisme vous empêchent de dormir la nuit <i class="fa fa-smile">.</i>
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
