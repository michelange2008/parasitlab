@extends('layouts.app')

@extends('extranet.menuExtranet')

@section('content')

  <div class="container-fluid">

    <div class="row my-3">

      <div class="col-md-10 m-auto">

        @titre(['titre' => "Choisir une analyse", 'icone' => 'question.svg'])

      </div>

      <div class="col-md-10 m-auto">

        <h2>Quel type d'animal est concerné ?</h2>

      </div>

      <div class="col-md-10 m-auto d-flex justify-content-around">

        @foreach ($especes as $espece)

          <img src="{!! asset('storage/img/icones').'/'.$espece->icone->nom !!}" alt="{{$espece->icone->nom}}" data-toggle="tooltip" title="{{ ucfirst($espece->nom) }}">

        @endforeach

      </div>

    </div>

  </div>

@endsection
