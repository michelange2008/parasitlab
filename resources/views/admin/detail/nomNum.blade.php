{{-- BLOC VALABLE AUSSI BIEN POUR UNE VETERINAIRE QUE POUR UN ELEVEUR D'OU L'EMPLOI DE $personne --}}
<div class="card-header-rouge-tres-fonce d-inline-flex">
  <img class="img-40" src="{{ url('storage/img/icones/'.$personne->user->usertype->icone->nom)}}" alt="{{ $personne->user->usertype->icone->nom }}">
  <h5 class="card-title mx-3">{{ $personne->user->name }} </h5>
  <p class="text-truncate" data-toggle="tooltip" title="{{ $personne->num }}">( ede n° {{ $personne->num }} )</p>
</div>
