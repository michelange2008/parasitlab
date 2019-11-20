<!-- FRAGMENT DESTINE A AFFICHIER LE TITRE D UN UTILISATEUR ET SON ICONE ET UN BOUTON POUR VOIR MODIFIER -->
<div class="mx-auto alert alert-bleu d-flex justify-content-between align-items-middle">

  <div class="d-inline-flex align-items-middle">

    <img class="img-40" src="{{ asset('storage/img/icones/')."/".$user->usertype->icone->nom }}" alt="">

    <h3 class="mx-3">{{ $user->name }}</h3>

  </div>

  <button class="btn btn-bleu rounded-0" type="button"
          data-toggle="collapse" data-target="#{{ $collapse }}" aria-expanded="false" aria-controls="modifier">

      Détails
      <span data-toggle="modal" data-target="#id">
        <a data-toggle="tooltip" data-placement="top" title="Cliquer pour voir les informations sur {{ $user->name }} et les modifier">
          +
        </a>
      </span>
    </button>

</div>
