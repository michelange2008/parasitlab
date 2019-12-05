@foreach ($serie->demandes as $demande)
  <div class="row">
    <div class="col-md-12 alert alert-bleu-tres-fonce">
        @include('fragments.dateFr', ['date' => $demande->date_prelevement]) - {{ ucfirst($demande->prelevements[0]->analyse->nom) }}
    </div>
  </div>
  @foreach ($demande->prelevements as $prelevement)

    <div class="row mb-3">
      <div class="col-md-12">
        <strong>
          {{ ucfirst($prelevement->identification) }}
        </strong>
      </div>
        <table class="table table-bordered table-hover">
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
    </div>
@endforeach
@endforeach
