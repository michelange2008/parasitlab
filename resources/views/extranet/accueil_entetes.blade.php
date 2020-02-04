
<div class="row my-3">

  <div class="card-deck">

    <div class="card">

      <img src="{{ asset('storage/img/icones/veto_rond.svg') }}" alt="vétérinaire">

      <div class="card-body">

        <h2 class="card-header">Vétérinaires</h2>

        <p class="card-text">
          Vous souhaitez proposer à vos éleveurs et clients un suivi parasitologique afin d'éviter les traitements inutiles.
        </p>

        <p class="card-text">Vous voulez évaluer les risques pathogènes et l'existence éventuelles de résistance aux anthelmintiques.</p>

      </div>

      <div class="card-footer">

        <a class="btn btn-rouge" href="{{ route('veterinaires.accueil') }}">En savoir plus</a>

      </div>

    </div>

    <div class="card">

      <img src="{{ asset('storage/img/icones/eleveur_rond.svg') }}" alt="eleveur">

      <div class="card-body">

        <h2 class="card-header">Eleveurs (euses)</h2>
        <p class="card-text">
          Vous souhaitez faire un suivi régulier et raisonné de l'infestation de votre troupeau pour ne plus traiter en aveugle.
        </p>

        <p class="card-text">
          Vous êtes à la recherche d'un laboratoire vous fournissant des réponses rapides à vos questions sur le parasitisme d'un animal ou de votre troupeau
        </p>

      </div>

      <div class="card-footer">

        <a class="btn btn-rouge" href="{{ route('eleveurs.accueil') }}">En savoir plus</a>

      </div>


    </div>

    <div class="card">

      <img src="{{ asset('storage/img/icones/cv_rond.svg') }}" alt="propriétaires de chevaux">

      <div class="card-body">

        <h2 class="card-header">Cavalières(-iers)</h2>

        <p class="card-text">
          Vous avez toujours traité sytématiquement, parce que c'est "<em>ce qui se fait</em>". Et pourtant, votre cheval n'est peut-être pas parasité.
        </p>

        <p class="card-text">
          De plus, les résistances des parasites aux traitements vont devenir un réel problème.
        </p>

      </div>

      <div class="card-footer">

        <a class="btn btn-rouge" href="{{ route('cavaliers.accueil') }}">En savoir plus</a>

      </div>

    </div>
  </div>

</div>
