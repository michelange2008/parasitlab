<div class="col-md-12 d-inline-flex alert alert-bleu @if(!$serie->acheve) alert-rouge-tres-fonce @endif">

  <img class="img-40 mx-3" src="{{asset('storage/img/icones')."/".$serie->anapack->icone->nom}}" alt="{{ $serie->anapack->nom }}">

  <h3>{{ucfirst($serie->anapack->nom)}}

    <small>(série @if(!$serie->acheve)non @endif terminée)</small>

  </h3>

</div>
