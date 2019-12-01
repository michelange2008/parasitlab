<!-- FRAGMENT DESTINE A AFFICHIER LE TITRE D UN UTILISATEUR ET SON ICONE ET UN BOUTON POUR VOIR MODIFIER
IL S'AGIT DE LA COMMANDE D'UN AFFICHAGE DE TYPE collapse AFFICHANT UNE card PAR CLIC
LES VARIABLES À PASSER SONT UN OBJET user ET UNE VARIABLE collapse QUI CORRESPOND À L'id DE LA CARD
(VOIR LE FRAGMENT eleveurModifier)
-->
<div class="mx-auto alert alert-bleu d-flex justify-content-between align-items-middle">

  <div class="d-inline-flex align-items-middle">

    <img class="img-40" src="{{ asset('storage/img/icones/')."/".$icone }}" alt="">

    <h3 class="mx-3">{{ ucfirst($titre) }}</h3>

  </div>
@if ($detail)
<!-- AFFICHAGE DU BOUTON DETAIL SEULEMENT SI LA VARIABLE COLLAPSE-->
  <button class="btn btn-bleu rounded-0" type="button"
  data-toggle="collapse" data-target="#{{ $collapse }}" aria-expanded="false" aria-controls="modifier">

  Détails
  <span data-toggle="modal" data-target="#id">
    <a data-toggle="tooltip" data-placement="top" title="Cliquer pour voir les informations sur {{ $titre }} et les modifier">
      +
    </a>
  </span>
</button>

@endif

</div>
