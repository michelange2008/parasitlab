
<div class="row my-3">

  <div class="col-md-12 col-lg-10 col-xl-8 mx-auto">

    @foreach ($accueilPastilles as $ligne)

      <div class="card-deck mb-3">

        @foreach ($ligne as $element)

          @include('fragments.carteBoutonRond', [
              'icone' => $element->icone,
              'titre' => __($element->prefixe.'titre'),
              'texte_1' => __($element->prefixe.'texte_1'),
              'texte_2' => __($element->prefixe.'texte_2'),
              'type' => 'route',
              'route' => $element->route,
              'id' => $element->id ?? null,
              'fa2' => 'fas fa-chevron-right',
              'intitule' => __('commun.know_more'),
            ])

        @endforeach

      </div>

    @endforeach

  </div>

</div>
