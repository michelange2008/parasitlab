<thead class="thead-bleu">

  <tr>

    <th colspan="2">

      {{ ucfirst($prelevement->identification) }}

      <small>(état du prélèvement: {{ $prelevement->etat->nom }} - Consistance: {{ $prelevement->consistance->nom }})</small>

    </th>

  </tr>

</thead>
