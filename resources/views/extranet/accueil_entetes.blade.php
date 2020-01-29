
<div class="row my-3">

  <div class="col-lg-4">

    <img src="{{ asset('storage/img/icones/veto_rond.svg') }}" alt="vétérinaire">

    <h2>Vétérinaires</h2>
    <p>
      Vous souhaitez proposer à vos éleveurs et clients un suivi parasitologique afin d'éviter les traitements inutiles.
    </p>

    <p>Vous voulez évaluer les risques pathogènes et l'existence éventuelles de résistance aux anthelmintiques.</p>

    <a class="btn btn-rouge" href="{{ route('veterinaires.accueil') }}">En savoir plus</a>

  </div>

  <div class="col-lg-4">

    <img src="{{ asset('storage/img/icones/eleveur_rond.svg') }}" alt="eleveur">

    <h2>Eleveurs (euses)</h2>
    <p>
      Vous souhaitez faire un suivi régulier et raisonné de l'infestation de votre troupeau pour ne plus traiter en aveugle.
    </p>

    <p>
      Vous êtes à la recherche d'un laboratoire vous fournissant des réponses rapides à vos questions sur le parasitisme d'un animal ou de votre troupeau
    </p>

    <a class="btn btn-rouge" href="{{ route('eleveurs.accueil') }}">En savoir plus</a>

  </div>

  <div class="col-lg-4">

    <img src="{{ asset('storage/img/icones/cv_rond.svg') }}" alt="propriétaires de chevaux">

    <h2>Propriétaires de chevaux</h2>

    <p>
      Vous avez toujours traité sytématiquement, parce que c'est "<em>ce qui se fait</em>". Et pourtant, votre cheval n'est peut-être pas parasité.
    </p>

    <p>
      De plus, les résistances des parasites aux traitements vont devenir un réel problème.
    </p>

    <a class="btn btn-rouge" href="{{ route('cavaliers.accueil') }}">En savoir plus</a>
  </div>

</div>
