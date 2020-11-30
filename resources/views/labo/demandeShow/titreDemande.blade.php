<div class="col-md-12 d-inline-flex alert alert-bleu-tres-fonce @if(!$demande->acheve) alert-rouge-tres-fonce @endif">


  <img class="img-40 mx-3" src="{{url('storage/img/icones/'.$demande->espece->icone->nom)}}" alt="{{ $demande->espece->nom }}">

  <h3>{{ucfirst($demande->user->name)}}&nbsp;: {{ucfirst($demande->anaacte->anatype->abbreviation  )}} - {{ ucfirst($demande->anaacte->abbreviation) }}

    <small>(@lang('commun.analyse') @if (!$demande->acheve) @lang('commun.nom') @endif @lang('commun.terminee'))</small>

  </h3>

</div>
