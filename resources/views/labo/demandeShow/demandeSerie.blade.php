
@if ($demande->anaacte->serie)

  <p class="color-rouge-tres-fonce">
    <i class="fas fa-exclamation-circle"></i> Cette analyse fait partie d'une série de prélèvements
      @nomLien([
        'nom' => "voir la série ",
        'id' => $demande->serie_id,
        'route' => 'routeurSerie',
        'tooltip' => "tooltips.affiche_detail_serie",
        'before' => "(",
        'after' => ")",

      ])

  </p>

@endif
