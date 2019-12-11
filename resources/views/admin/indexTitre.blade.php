<div class="d-flex alert alert-bleu rounded-0">

  <img class="img-50" src="{{ asset('storage/img/icones')."/".$icone->nom }}" alt="{{ $icone->nom }}">

  <h3 class="pt-3 ml-3">{{ ucfirst($titre) ?? '' }} <small>{{ $soustitre ?? ''}}</small> </h3>

</div>
