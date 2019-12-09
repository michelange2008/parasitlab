<div class="d-flex alert alert-bleu rounded-0">

  <img class="img-50" src="{{ asset('storage/img/icones')."/".$usertype->icone->nom }}" alt="{{ $usertype->icone->nom }}">

  <h3 class="ml-3">{{ $titre ?? '' }} <small>{{ $soustitre ?? ''}}</small> </h3>

</div>
