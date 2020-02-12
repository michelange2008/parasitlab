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

      <div class="col-md-10 mx-auto my-3 d-flex justify-content-around">

        @foreach ($especes as $espece)

          <a id="espece_{{ $espece->id }}" class="espece" name="{{ $espece->nom }}" href="#">

            <img class="img-zoom" src="{!! asset('storage/img/icones').'/'.$espece->icone->nom !!}" alt="{{$espece->icone->nom}}" data-toggle="tooltip" title="{{ ucfirst($espece->nom) }}">

          </a>

        @endforeach

      </div>

    </div>

    <div id='liste_anapacks' class="row my-3" style="display:none">

      <div class="col-md-10 m-auto">

        <h2 id='titre'>Voici les analyses proposées pour les </h2>

      </div>

    </div>


      <div class="row my-3">

        @foreach ($liste as $espece_id => $anapacks)

        <div class="col-md-10 mx-auto">

          <div class="card-deck d-flex justify-content-center">


              @foreach ($anapacks as $anapack)

                <div id='card_{{$espece_id}}' class="anapack_{{$espece_id}} anapack my-3 card" style="min-width:25vw; max-width:25vw; display:none">

                  <img class="m-3" src="{!! asset('storage/img/icones')."/".$anapack->icone->nom !!}" alt="{{$anapack->icone->nom}}">

                  <div class="card-body">

                    <h4 class="card-title">{{ $anapack->nom }}</h4>

                    <p class="card-text">{{ $anapack->detail }}</p>

                  </div>

                  <div class="card-footer">

                    <p>Prix de l'analyse:</p>

                    @include('fragments.bouton', ['type' => 'link', 'lien' => asset('/choisir/'.$espece_id.'/'.$anapack->id), 'intitule' => "Télécharger le formulaire"])

                  </div>

                </div>


              @endforeach

            </div>

          </div>

        @endforeach

      </div>


  </div>

@endsection
