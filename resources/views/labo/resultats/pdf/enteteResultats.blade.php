<div class="pdf-entete">
  <table class="" style="width:100%">
    <tr>
      <td>
        <img width="250px" src="images/logo.svg" alt="Logo du labo">
        <p class="adresseFibl">Pôle Bio - Ecosite du Val de Drôme</p>
        <p class="adresseFibl">150 Avenue de Judée - F-26400 EURRE</p>
      </td>
      <td class="text-right">
        <p class="adresseFibl">Date signature: {{$demande->date_signature}}</p>
        <p class="adresseFibl">Référence dossier {{$demande->id}}</p>
        <p class="adresseFibl">{{ucfirst($demande->anaacte->anatype->nom)}}</p>
      </td>
    </tr>
  </table>


</div>
