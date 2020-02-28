
<div class="row my-3">

  <div class="col-md-10 col-lg-8 mx-auto">


    <div class="card-deck mb-3">

      @include('fragments.carteBoutonRond', [
        'icone' => 'copr.svg',
        'titre' => 'Coproscopies',
        'texte_1' => "Si l'on souhaite gérer le parasitisme de son troupeau avec peu (ou pas) de traitements, il est indispensable de suivre les niveaux d'infestation.",
        'texte_2' => "Les analyses coproscopiques sont une aide précieuse en complément de l'observation des animaux",
        'type' => 'route',
        'route' => 'coproscopies',
        'couleur' => 'color-bleu-tres-fonce',
        'intitule' => 'En savoir plus',
        'fa2' => 'fas fa-chevron-right',
      ])

      @include('fragments.carteBoutonRond', [
        'icone' => 'parasitisme.svg',
        'titre' => 'Parasites',
        'texte_1' => "      Les différents parasites des animaux d'élevage ont tous des cycles bien définis,
        des localisations précises aux sein de l'organisme et des modes de survie variables selon les espèces.",
        'texte_2' => "En réponse à l'infestation parasitaire, les animaux développent une immunité variable et plus ou moins durable.",
        'type' => 'route',
        'route' => 'parasitisme',
        'couleur' => 'color-bleu-tres-fonce',
        'intitule' => 'En savoir plus',
        'fa2' => 'fas fa-chevron-right',
      ])

    </div>

    <div class="card-deck">

      @include('fragments.carteBoutonRond', [
        'icone' => 'resi.svg',
        'titre' => 'Résistances',
        'texte_1' => "       Le développement de résistances aux traitements antiparasitaires est un processus naturel inévitable.
        Les élevages caprins sont les premiers concernés.",
        'texte_2' => "En réponse à l'infestation parasitaire, les animaux développent une immunité variable et plus ou moins durable.",
        'type' => 'route',
        'route' => 'parasitisme.resistances',
        'couleur' => 'color-bleu-tres-fonce',
        'intitule' => 'En savoir plus',
        'fa2' => 'fas fa-chevron-right',
      ])


      @include('fragments.carteBoutonRond', [
        'icone' => 'entomo.svg',
        'titre' => 'Biodiversite',
        'texte_1' => "Certains traitements anthelmintiques ont des propriétés insecticides et son rejetés avec les fécès des animaux.",
        'texte_2' => "Du fait de leur persistance dans la pature, ils détruisent les insectes qui dégrade les bouses, crottes et crottins.",
        'type' => 'route',
        'route' => 'parasitisme.entomofaune',
        'couleur' => 'color-bleu-tres-fonce',
        'intitule' => 'En savoir plus',
        'fa2' => 'fas fa-chevron-right',
      ])

    </div>

  </div>

</div>
