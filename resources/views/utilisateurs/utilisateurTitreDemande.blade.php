<div class="col-md-12 alert alert-bleu-tres-fonce @if(!$demande->acheve) alert-rouge-tres-fonce @endif">

  <div class="d-inline-flex">

    <img class="img-40 mx-3" src="{{url('storage/img/icones/'.$demande->anaacte->anatype->icone->nom)}}" alt="{{ $demande->espece->nom }}">

    <h3>{!! ucfirst($demande->anaacte->anatype->nom).'<br><span class="small">('.$demande->anaacte->nom.' )</span>' !!}</h3>

  </div>

</div>
