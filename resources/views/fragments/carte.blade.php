<div class="card">

  <img class="m-3" src="{!! url('storage/img/icones/'.$icone) !!}" alt="email">

  <div class="card-body">

    <h3 class="card-header">{!! $titre !!}</h3>

    <p>{!! $texte_1 ?? '' !!}</p>

    <p>{!! $texte_2 ?? ''!!}</p>

    <p>{!! $texte_3 ?? ''!!}</p>

  </div>

  <div class="card-footer">

    @bouton()

  </div>

</div>
