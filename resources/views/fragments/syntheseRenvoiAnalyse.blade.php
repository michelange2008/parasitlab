@if ($demande->date_resultat !== null)
  <table class="table table-hover">
    <thead class="alert-bleu">
      <tr>
        <th>Renvoyer les résultats</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><small>{{ $demande->user->name }}</small></td>
        <td>
          <a href="{{ $route }}" title="Renvoyer l'email à l'éleveur">
            <i class="material-icons">play_arrow</i> <i class="material-icons">email</i>
          </a>
        </td>
      </tr>
      @if ($demande->toveto)
        <tr>
          <td>{{ $demande->veto->user->name }}</td>
          <td>
            <a href="{{ $route }}" title="Renvoyer l'email à l'éleveur">
              <i class="material-icons">play_arrow</i> <i class="material-icons">email</i>
            </a>
          </td>
        </tr>
      @endif
    </tbody>
  </table>
@endif
