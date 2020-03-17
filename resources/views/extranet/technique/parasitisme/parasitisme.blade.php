@extends('layouts.app')

@extends('extranet.menuExtranet')

@section('content')

  <div class="container-fluid">

    <div class="col-md-3 bd-sidebar my-3 d-none d-md-block">

      <h4>Rechercher un sujet</h4>

      <form class="form-inline my-3" style="flex-wrap:nowrap">
        <input class="form-control" type="search" placeholder="chercher" aria-label="Search" style="width:80%">
        <button class="form-control btn btn-bleu my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
      </form>

      <h4>Derniers sujets</h4>

    </div>

    <div class="row justify-content-end my-3">

      <div class="col-md-9">

        @titre(['titre' => "Parasit'Lab Infos&nbsp;:", "soustitre" => "Des réponses à vos questions sur la parasitisme", "icone" => 'blog.svg'])

      </div>

    </div>

    <div class="row justify-content-end">

      <div class="col-md-9">

        <div class=" bg-bleu-tres-clair p-3">


          Cette page est destinée à vous permettre d'approfondir vos connaissances sur le parasitisme.
          Elle n'est pas une encyclopédie de parasitologie, mais elle s'attache à répondre aux questions que vous vous posez le plus souvent.
          N'hésitez donc pas à nous interroger par mail si certaines interrogations sur le parasitisme vous empêchent de dormir la nuit <i class="fa fa-smile">.</i>

        </div>

      </div>

    </div>

  </div>

@endsection
