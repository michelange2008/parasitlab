<div class="col-md-12 d-inline-flex alert alert-bleu @if(!$serie->acheve) alert-rouge-tres-fonce @endif">

  <img class="img-40 mx-3" src="{{ url('storage/img/icones/'.$serie->anaacte->icone->nom) }}" alt="{{ $serie->anaacte->nom }}">

  <div>

    <h3>{{ucfirst($serie->anaacte->nom)}}</h3>

    <p>série @if(!$serie->acheve)non @endif terminée</p>

    </div>

</div>
