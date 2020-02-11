@extends('layouts.app')

@extends('extranet.menuExtranet')

@section('content')

  <div class="container-fluid">

    <div class="row my-3">

      <div class="col-md-10 m-auto">

        @titre(['titre' => "Choisir une analyse", 'icone' => 'question.svg'])

      </div>

      <div class="col-md-10 mx-auto my-3">

        <h2>Quel type d'animal est concerné ? <small>(cliquez sur l'icone correspondante)</small> </h2>

      </div>

      <div class="col-md-12 mx-auto my-3 d-flex justify-content-around">

        @foreach ($especes as $espece)

          <a id="espece_{{ $espece->id }}" class="espece" href="#">

            <img class="img-zoom" src="{!! asset('storage/img/icones').'/'.$espece->icone->nom !!}" alt="{{$espece->icone->nom}}" data-toggle="tooltip" title="{{ ucfirst($espece->nom) }}">

          </a>

        @endforeach

      </div>

      </div class="col-md-12 m-auto">


      </div>

    </div>

  </div>

@endsection
