@extends('layouts.app')

@extends('labo.laboMenu')

@section('content')
<div class="container-fluid">

  <div class="row justify-content-center my-3">
    @if ($serie->acheve)
      <div class="col-md-8 d-inline-flex alert alert-bleu rounded-0">
        <img class="img-40 mx-3" src="{{asset('storage/img/icones')."/".$serie->espece->icone->nom}}" alt="">
        <h3>{{ucfirst($serie->user->name)}} - {{ucfirst($serie->anapack->nom)}} <small>(série terminée)</small></h3>
      </div>
    @else
      <div class="col-md-8 d-inline-flex alert alert-rouge rounded-0">
        <img class="img-40 mx-3" src="{{asset('storage/img/icones')."/".$serie->espece->icone->nom}}" alt="">
        <h3>{{ucfirst($serie->user->name)}} - {{ucfirst($serie->anapack->nom)}} <small>(série en cours)</small></h3>
      </div>
    @endif
  </div>

  @if ($identique)

    <div class="row justify-content-center">
      <div class="col-md-8">
        @include('labo.serieShow.detailIdentique', ['demandes', $demandes])
      </div>
    </div>

  @endif

  <div class="row">
    <div class="col-md-8">
      @include('labo.serieShow.detailDifferent', ['demandes', $demandes])
    </div>
  </div>

</div>
@endsection
