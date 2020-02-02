<div class="bg-bleu-tres-fonce p-3 align-items-middle color-bleu-tres-clair">


  <img class="img-90 d-none ck d-lg-block img-claire" src="{!! asset('storage/img/icones').'/'.auth()->user()->usertype->icone->nom !!}" alt="">

  <h4 class="d-lg-block">Page personnelle</h4>

  <p class="d-none d-lg-block">

    Cet accès vous est réservé. Vous y trouverez les résultats d'analyse vous concernant.
    Vous aurez ainsi la possiblité de visionner les résultats des demandes d'analyses terminées
    et de les télécharger sous format pdf.
  </p>


  <p class="d-none d-lg-block">

    C'est en cliquant sur les intitulés suivis de cette petite icone <i class="text-light fas fa-eye"></i> que
    vous aurez accès au détail des analyses ou des séries d'analyse.

  </p>

  <p class="d-none d-lg-block">

    En cas de difficulté d'accès ou de navigation sur le site, n'hésitez pas à <a href="{!! route('contact') !!}"><i class="fas fa-comments"></i> <strong>nous contacter</strong></a>

  </p>

  <p class="d-none d-lg-block text-right"><i>L'équipe du laboratoire</i></p>
</div>
