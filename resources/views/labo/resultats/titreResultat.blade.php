<thead class="thead-bleu">

  <tr>

    <th colspan="2">

      {{ ucfirst($prelevement->identification) }} {{ $prelevement->animal->numero ?? ''}}

      <small>(@lang('demandes.etat_prelevement') {{ $prelevement->etat->nom }})</small>

    </th>

  </tr>

</thead>
