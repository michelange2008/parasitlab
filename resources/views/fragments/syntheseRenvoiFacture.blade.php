<table class="table">

  <thead class="alert-bleu">

    <tr>
      <th>Renvoyer la facture</th>

      <th></th>

    </tr>

  </thead>


  <tbody>


    <tr>

      <td>

        <small>{{ $demande->facture->user->name }}</small>

      </td>

      <td>

        <a href="{{ $route }}" title="Renvoyer l'email à l'éleveur">

          <i class="material-icons">play_arrow</i> <i class="material-icons">email</i>

        </a>

      </td>

    </tr>

  </tbody>

</table>
