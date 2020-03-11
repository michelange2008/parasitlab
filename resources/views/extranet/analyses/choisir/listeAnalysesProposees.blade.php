<div id='card_{{$espece_id}}' class="anapack_{{$espece_id}} anapack my-3 card card-3" style="display:none">

  <img class="m-3" src="{!! 'storage/img/icones/'.$anapack->icone->nom !!}" alt="{{$anapack->icone->nom}}">

  <div class="card-body">

    <h4 class="card-title">{{ ucfirst($anapack->nom) }}</h4>

    <p class="card-text">{{ ucfirst($anapack->detail) }}</p>

  </div>

  <div class="card-footer">

    <p>Coût:</p>

    @include('fragments.bouton', [
      'type' => 'link',
      'target' => '_self',
      'lien' => asset('/choisir/'.$espece_id.'/'.$anapack->id),
      'intitule' => "Remplir le formulaire",
      'fa' => 'fas fa-pen',
      'couleur' => 'btn-secondary'])

  </div>

</div>
