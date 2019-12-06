<table class="table table-bordered table-hover">
  <thead class="thead-bleu">
    <tr>
      <th colspan="2">
        {{ ucfirst($prelevement->identification) }}
        <small>(état du prélèvement: {{ $prelevement->etat->nom }} - Consistance: {{ $prelevement->consistance->nom }})</small>
      </th>
    </tr>
  </thead>
  <tbody>
    @foreach ($prelevement->resultats as $resultat)
      @if ($resultat->positif)
        <tr>
          <td>{{ $resultat->anaitem->nom }}</td>
          <td class="text-right">{{ $resultat->valeur }} {{ $resultat->anaitem->unite->nom }}</td>
        </tr>
      @endif
    @endforeach
  </tbody>
</table>
<p class="small">
  <span class="font-italic">Parasites recherchés mais non retrouvés (en-dessous du seuil de détection) :</span>
  @foreach ($prelevement->resultats as $resultat)
      @if (!$resultat->positif)
        @if ($loop->first)
          {{ ucfirst($resultat->anaitem->nom) }}
        @elseif ($loop->last)
          {{ $resultat->anaitem->nom }}.
        @else
           {{ $resultat->anaitem->nom }},
        @endif
      @endif
  @endforeach
</p>
