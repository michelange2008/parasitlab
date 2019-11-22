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
          <a href="{{ route('demandes.show', $demande->id) }}"
            data-toggle="tooltip" data-placement="top"
            title="Voir le détail de l'analyse">
            <i class="text-center text-success material-icons">launch</i>
          </a>
        </td>
        <td>
          <a href="{{ route('eleveurAdmin.show', $demande->user->id) }}"
            data-toggle="tooltip" data-placement="top"
            title="cliquer pour afficher l'éleveur">
              {{ $demande->user->name }}</td>
          </a>
        <td class="text-center">
          <span class="d-none">{{$demande->espece->nom}}</span>
          <img class="img-40" src="{{ asset('storage/img/icones/'.$demande->espece->icone->nom) }}"
            alt="{{$demande->espece->nom}}"
            data-toggle="tooltip" data-placement="top"
            title="{{ $demande->espece->nom }}">
        </td>
        <td class="text-center">
          <a href="{{ route('vetoAdmin.show', $demande->veto->id)}}"
            data-toggle="tooltip" data-placement="top"
            title="cliquer pour afficher le vétérinaire">
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
          <a href="#">{{ $demande->facture->id }} <i class="material-icons">zoom_in</i></a>
        </td>
        <td class="text-center">
          <a id="supprAnalyse_{{$demande->id}}" class="supprAnalyse"
            href="{{ route('demandes.destroy', $demande->id) }}"
            data-toggle="tooltip" data-placement="top"
            title="Supprimer cette analyse">
            <i class="text-center text-danger material-icons">delete_outlined</i>
          </a>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
