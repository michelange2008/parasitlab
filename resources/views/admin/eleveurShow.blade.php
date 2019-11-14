@extends('layouts.app')

@extends('labo.laboMenu')

@section('content')

  <div class="container">
    <div class="row my-3">
      <div class="col-md-10 mx-auto alert alert-bleu">
        <h3>{{ $eleveur->name }}</h3>
      </div>
    </div>
    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-4">
        <div class="list-group" id="list-tab-eleveur" role="tablist">
          <a class="list-group-item list-group-item-action list-group-item-bleu-tres-clair active" href="#info" role="tab" aria-controls="info">Informations</a>
          @foreach ($analyses as $analyse)
            <a class="list-group-item list-group-item-action" href="#dem_{{ $analyse->id }}" role="tab" aria-controls="ana{{ $analyse->id }}">{{ $analyse->anapack->nom }} <br>({{\Carbon\Carbon::create($analyse->reception)->formatLocalized('%A %d %B %Y')}})</a>
          @endforeach
        </div>
      </div>
      <div class="col-md-6 border">
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="list-info-list">
            <div class="my-3 lead" style="font-weight:bold; color:#0A425A">
              <p class="soustitre">{{ $eleveur->name }}</p>
            </div>
            <div class="">
              <p><span class="text-muted">Numéro de cheptel: </span>{{ $eleveur->eleveur->ede }}</p>
            </div>
            <div class="">
              <p><span class="text-muted">Adresse mail: </span>{{ $eleveur->email }}</p>
            </div>
            <div class="">
              <p>
                <span class="text-muted">Adresse: </span>
                {{ $eleveur->eleveur->address_1 }} {{ $eleveur->eleveur->address_2 }} {{ $eleveur->eleveur->cp }} {{ $eleveur->eleveur->commune }}
              </p>
            </div>
            <div class="">
              <p><span class="text-muted">Téléphone: </span>(00{{ $eleveur->eleveur->indicatif }}) {{ $eleveur->eleveur->tel }}</p>
            </div>
            <div class="">
              <p><span class="text-muted">Vétérinaire déclaré:</span> {{ ucfirst($eleveur->eleveur->veto->user->name) }}</p>
            </div>
          </div>
          @foreach ($analyses as $analyse)
            <div class="tab-pane fade" id="dem_{{ $analyse->id }}" role="tablist" aria-labelledby="list-ana{{ $analyse->id }}-list">
              <p>Informations sur les analyses</p>
              <p>{{ $analyse->prelevement }}</p>
              <p>{{ $analyse->toveto }}</p>
            </div>
          @endforeach
        </div>
      </div>
    </div>


  </div>

@endsection
