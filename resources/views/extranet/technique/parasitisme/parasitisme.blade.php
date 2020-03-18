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

        <ul class="list-unstyled">

          @foreach ($derniers_articles as $article)

              <li class="media my-3">

                <img width="250px" src="{{ url('storage/img/blog').'/'.$article->image }}" alt="">

                <div class="media-body ml-3">

                  <h5 class="mt-0 mb-1">{{ ucfirst($article->titre) }} <span class="text-muted" >(@date($article->updated_at))</span> </h5>

                  {!! $article->contenu !!}

                  <p class="blockquote-footer">{{ $article->user->name }}</p>

                </div>

              </li>

          @endforeach

        </ul>

      </div>

    </div>

  </div>

@endsection
