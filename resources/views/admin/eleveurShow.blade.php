@extends('layouts.app')

@extends('labo.laboMenu')

@section('content')

  <div class="container">
    <div class="row my-3">
      <div class="col-md-10 mx-auto alert alert-bleu">
        <h3>{{ $eleveur->name }}</h3>
      </div>
    </div>
    <div class="col-md-4">
      <ul class="list-group" id="list-tab" role="tablist">
        <li class="list-group-item list-group-item-action list-group-item-primary active" href="#info" id="information">Informations</li>
        @foreach ($analyses as $analyse)
          <li class="list-group-item list-group-item-action">{{ $analyse->anapack->nom }} <br>({{\Carbon\Carbon::create($analyse->reception)->formatLocalized('%A %d %B %Y')}})</li>
        @endforeach
      </ul>
    </div>
    <div class="col-md-8">
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="infon" aria-labelledby="information">
          {{ $eleveur->ede }}
        </div>
      </div>
    </div>
  </div>

@endsection
