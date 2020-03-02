<div id='card_{{$espece_id}}' class="anapack_{{$espece_id}} anapack my-3 card" style="min-width:25vw; max-width:25vw; display:none">

  <img class="m-3" src="{!! asset('storage/img/icones')."/".$anapack->icone->nom !!}" alt="{{$anapack->icone->nom}}">

  <div class="card-body">

    <h4 class="card-title">{{ $anapack->nom }}</h4>

    <p class="card-text">{{ $anapack->detail }}</p>

  </div>

  <div class="card-footer">

    <p>Prix de l'analyse:</p>

    @include('fragments.bouton', [
      'type' => 'link',
      'target' => '_self',
      'lien' => asset('/choisir/'.$espece_id.'/'.$anapack->id),
      'intitule' => "Remplir le formulaire",
      'fa' => 'fas fa-pen',
      'couleur' => 'btn-secondary'])

  </div>

</div>
