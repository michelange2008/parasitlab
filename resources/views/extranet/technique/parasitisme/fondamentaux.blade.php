@extends('layouts.app')

@extends('extranet.menuExtranet')

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-md-10">

        @titre(['titre' => $article->titre, 'soustitre' => $article->soustitre, 'icone' => $article->icone])

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-10">

        @include('extranet.technique.parasitisme.'.$article->vue)

      </div>

    </div>

    <div class="row justify-content-center my-3">

      <div class="col-md-10">

        @retour()

      </div>

    </div>

  </div>

@endsection
