  <img class="img-40 mx-3" src="{{asset('storage/img/icones')."/".$serie->espece->icone->nom}}" alt="{{ $serie->espece->nom }}">
  <h3>{{ucfirst($serie->user->name)}} - {{ucfirst($serie->anapack->nom)}}
    <small>(série @if(!$serie->acheve)non @endif terminée)</small>
  </h3>
