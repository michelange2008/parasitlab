<div id='card_{{$espece->id}}' class="anatype_{{$espece->id}} anatype my-3 card card-3" style="display:none">

  <img class="m-3" src="{!! url('storage/img/icones/'.$anatype->icone->nom) !!}" alt="{{$anatype->icone->nom}}">

  <div class="card-body">

    <h4 class="card-title">{{ ucfirst($anatype->nom) }}</h4>

    <p class="card-text small font-italic">{{ ucfirst($anatype->technique) }}</p>

    @foreach ($anatype->anaactes as $anaacte)

      <p class="card-text">{{ ucfirst($anaacte->nom) }}&nbsp;: {{ $anaacte->pu_ht }}&nbsp;€</p>

    @endforeach

  </div>

  <div class="card-footer">

    @bouton([
      'type' => 'link',
      'target' => '_self',
      'lien' => url('/analyses/choisir/'.$espece->id.'/'.$anatype->id),
      'intitule' => __('choisir.fill_form'),
      'fa' => 'fas fa-pen',
      'couleur' => 'btn-secondary'])

  </div>

</div>
