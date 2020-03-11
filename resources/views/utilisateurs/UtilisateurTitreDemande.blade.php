<div class="col-md-12 alert alert-bleu-tres-fonce @if(!$demande->acheve) alert-rouge-tres-fonce @endif">

  <div class="d-inline-flex">

    <img class="img-40 mx-3" src="{{'storage/img/icones/'.$demande->anapack->icone->nom}}" alt="{{ $demande->espece->nom }}">

    <h3>{{ucfirst($demande->anapack->nom)}}</h3>

  </div>

</div>
