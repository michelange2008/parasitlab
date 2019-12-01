<div class="collapse" id="{{ $collapse }}">
  <div class="card card-body">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Parasite</th>
          <th>Résultat</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($prelevement->resultats as $resultat)
          @if ($resultat->valeur !== "0" && $resultat->valeur !== "absence")
            <tr>
              <td>{{ $resultat->anaitem->nom }}</td>
              <td>{{ $resultat->valeur }} {{ $resultat->anaitem->unite->nom }}</td>
            </tr>
          @endif
        @endforeach
      </tbody>
    </table>
    <div class="row justify-content-center">
      <div class="col-md-12">
        <strong>Autres parasites recherchés mais non détectés: </strong>
        @foreach ($prelevement->resultats as $resultat)
          @if ($resultat->valeur === "0" || $resultat->valeur === "absence")
            @if ($loop->last)
              {{ $resultat->anaitem->nom }}.
            @else
              {{ $resultat->anaitem->nom }},
            @endif
          @else
            aucun
          @endif
        @endforeach
      </div>
    </div>
  </div>
</div>
