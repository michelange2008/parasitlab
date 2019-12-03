  <ul class="list-group list-group-horizontal-md">
    <li class="list-group-item">Dans cette série, tous les lots sont identiques</li>
    <li class="list-group-item">Il y a {{ $demandes->count() }} prélèvement à chaque fois</li>
  </ul>

<table class="table table-hover">
  <thead>
    <tr>
      <th>Lot</th>
      @foreach ($demandes as $demande)
        <th class="text-center">
          @isset($demande->date_prelevement)
            @include('fragments.colonneDate', ['date' => $demande->date_prelevement])
          @else
            @include('fragments.colonneDate', ['date' => $demande->date_reception])
          @endisset
        </th>
      @endforeach
    </tr>
  </thead>
  @foreach ($demande->prelevements as $prelevement)
    <thead class="thead-dark">
      <tr>
        <th colspan="4">{{ $prelevement->identification }}</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($prelevement->resultats as $resultat)
        @if ($resultat->valeur !== null && $resultat->valeur !== "0" && $resultat->valeur != "absence")
          <tr>
            <td>
              {{$resultat->anaitem->nom}}
            </td>
            <td>
              {{ $resultat->valeur }}
            </td>
          </tr>
        @endif
      @endforeach
    </tbody>
  @endforeach
  </table>
