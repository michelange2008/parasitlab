
<div class="row my-3">

  <div class="card-deck">

    @include('fragments.carte', [
      'icone' => 'veto_rond.svg',
      'titre' => 'Vétérinaires',
      'texte_1' => "Vous souhaitez proposer à vos éleveurs et clients un suivi parasitologique afin d'éviter les traitements inutiles.",
      'texte_2' => "Vous voulez évaluer les risques pathogènes et l'existence éventuelles de résistance aux anthelmintiques.",
      'type' => 'route',
      'route' => 'veterinaires.accueil',
      'couleur' => 'btn-rouge',
      'intitule' => 'En savoir plus',
    ])

    @include('fragments.carte', [
      'icone' => 'eleveur_rond.svg',
      'titre' => 'Eleveurs (-euses)',
      'texte_1' => "Vous souhaitez faire un suivi régulier et raisonné de l'infestation de votre troupeau pour ne plus traiter en aveugle.",
      'texte_2' => "Vous êtes à la recherche d'un laboratoire vous fournissant des réponses rapides à vos questions sur le parasitisme d'un animal ou de votre troupeau.",
      'type' => 'route',
      'route' => 'eleveurs.accueil',
      'couleur' => 'btn-rouge',
      'intitule' => 'En savoir plus',
    ])

    @include('fragments.carte', [
      'icone' => 'cv_rond.svg',
      'titre' => 'Cavalières (-iers)',
      'texte_1' => "Vous avez toujours traité sytématiquement, parce que c'est \"ce qui se fait\". Et pourtant, votre cheval n'est peut-être pas parasité.",
      'texte_2' => "De plus, les résistances des parasites aux traitements vont devenir un réel problème.",
      'type' => 'route',
      'route' => 'cavaliers.accueil',
      'couleur' => 'btn-rouge',
      'intitule' => 'En savoir plus',
    ])

  </div>

</div>
