<table id="table-demandes" class="table hover">
  <thead>
    <tr>
      @foreach ($intitules as $intitule)
        <th>{{$intitule}}</th>
      @endforeach
    </tr>
  </thead>
  <tbody>
    @foreach ($demandes as $demande)
      <tr>
        <td>{{ $demande->anapack->nom}}</td>
        <td class="text-center"><span class="d-none">{{$demande->espece->nom}}</span><img class="img-40" src="{{ asset('storage/img/icones/'.$demande->espece->icone->nom) }}" alt="{{$demande->espece->nom}}"></td>
        <td class="text-center"><a href="{{ route('vetoAdmin.show', $demande->veto->id)}}">{{ ($demande->toveto === 1 ? $demande->veto->user->name : "") }}</a></td>
        <td class="text-center">{{(new Carbon\Carbon($demande->reception))->toFormattedDateString() }}</td>
        <td class="text-center">{{(null !== $demande->resultat ? (new Carbon\Carbon($demande->resultat))->toFormattedDateString() : "") }}</td>
        <td class="text-center">{{(null !== $demande->envoi ? (new Carbon\Carbon($demande->envoi))->toFormattedDateString() : "") }}</td>
        {{-- <td class="text-center">{{(null !== $demande->facture ? (new Carbon\Carbon($demande->facture))->toFormattedDateString() : "") }}</td> --}}
        <td class="text-center">{{ $demande->facture->faite_date}}</td>
        <td class="text-center"></td>
        <td class="text-center"></td>
        <td class="text-center"></td>
      </tr>
    @endforeach
  </tbody>
</table>
