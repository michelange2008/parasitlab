
<div class="row my-3">

  <div class="col-md-12 col-lg-10 col-xl-8 mx-auto">

    @foreach ($accueilPastilles as $ligne)

      <div class="card-deck mb-3">

        @foreach ($ligne as $element)

          @include('fragments.carteBoutonRond', [
              'icone' => $element->icone,
              'titre' => $element->titre,
              'texte_1' => $element->texte_1,
              'texte_2' => $element->texte_2,
              'type' => 'route',
              'route' => $element->route,
              'couleur' => 'color-bleu-tres-fonce',
              'intitule' => 'En savoir plus',
              'fa2' => 'fas fa-chevron-right',
            ])

        @endforeach

      </div>

    @endforeach

  </div>

</div>
