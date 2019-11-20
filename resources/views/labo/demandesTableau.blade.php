<table id="table-demandes" class="table hover">
  <thead class="alert-bleu-tres-fonce">
    <tr>
      @foreach ($intitules as $intitule)
        <th class="align-middle text-center">{{$intitule}}</th>
      @endforeach
    </tr>
  </thead>
  <tbody>
    @foreach ($demandes as $demande)
      <tr>
        <td>{{ $demande->anapack->nom}}</td>
        <td class="text-center">
          <span class="d-none">{{$demande->espece->nom}}</span>
          <img class="img-40" src="{{ asset('storage/img/icones/'.$demande->espece->icone->nom) }}" alt="{{$demande->espece->nom}}">
        </td>
        <td class="text-center">
          <a href="{{ route('vetoAdmin.show', $demande->veto->id)}}">
            {{ ($demande->toveto === 1 ? $demande->veto->user->name : "") }}
          </a>
        </td>
        <td class="text-center">
          {{(new Carbon\Carbon($demande->reception))->format('d/m/y') }}
        </td>
        <td class="text-center">
          {{(null !== $demande->resultat ? (new Carbon\Carbon($demande->resultat))->format('d/m/y') : "") }}
        </td>
        <td class="text-center">
          {{(null !== $demande->envoi ? (new Carbon\Carbon($demande->envoi))->format('d/m/y') : "") }}
        </td>
        <td class="text-center">
          {{($demande->facture->envoyee ? (new Carbon\Carbon($demande->facture->envoyee_date))->format('d/m/y') : "") }}
        </td>
        <td class="text-center">
          {{($demande->facture->payee ? (new Carbon\Carbon($demande->facture->payee_date))->format('d/m/y') : "") }}
        </td>
        <td class="text-center">
          <a href="{{ route('demandes.show', $demande->id) }}">
            <i class="text-center text-success material-icons">launch</i>
          </a>
        </td>
        <td class="text-center">
          <a href="{{ route('demandes.destroy', $demande->id) }}">
            <i class="text-center text-danger material-icons">delete_outlined</i>
          </a>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
