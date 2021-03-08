<div class="col-md-12 alert alert-bleu-tres-fonce d-inline-flex @if(!$demande->signe) alert-rouge-tres-fonce @endif">

  <img class="img-50 mx-3" src="{{url('storage/img/icones/'.$demande->anaacte->anatype->icone->nom)}}" alt="{{ $demande->espece->nom }}">

  <div class="">


    <h3>{{ $demande->user->name }}</h3>

    <h4>{{ ucfirst($demande->anaacte->anatype->nom) }}<br><span class="small">{{ ucfirst($demande->anaacte->nom) }}</span></h4>

  </div>

</div>
