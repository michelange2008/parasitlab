<div class="collapse" id="{{ $collapse }}">
  <div class="card">
    <div class="card-header">
      <div class="row">
        <div class="col-md-6">
          Etat du prélèvement : <strong>{{ $prelevement->etat->nom }}</strong>
        </div>
        <div class="col-md-6">
          Consistance des fèces : <strong>{{ $prelevement->consistance->nom }}</strong>
        </div>
      </div>
    </div>
    <div class="card-body">
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

          @php $aucun = 0 @endphp {{-- pour tester s'il n'y a aucun parasite recherché mais non détecté --}}

          @foreach ($prelevement->resultats as $resultat)
            @if ($resultat->valeur === "0" || $resultat->valeur === "absence")

              @php $aucun++ @endphp

              @if ($loop->last)
                {{ $resultat->anaitem->nom }}.
              @else
                {{ $resultat->anaitem->nom }},
              @endif

            @endif

          @endforeach

          @if ($aucun === 0)
            aucun
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
