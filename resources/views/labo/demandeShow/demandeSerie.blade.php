
@if ($demande->anapack->serie)

  <p>
    Cette analyse fait partie d'une série de prélèvements
      @nomLien([
        'nom' => "(voir la série)",
        'id' => $demande->serie_id,
        'route' => 'serie.show',
        'tooltip' => "Cliquer pour afficher la série",
      ])

  </p>

@endif
