<div class="pdf-entete">
  <table class="" style="width:100%">
    <tr>
      <td>
        <img width="250px" src="images/logo.svg" alt="Logo du labo">
        <p class="adresseFibl">Pôle Bio - Ecosite du Val de Drôme</p>
        <p class="adresseFibl">150 Avenue de Judée - F-26400 EURRE</p>
      </td>
      <td class="text-right">
        <p class="adresseFibl">Date facture: {{$elementDeFacture->facture->faite_date}}</p>
        <p class="adresseFibl">Référence dossier {{$elementDeFacture->facture->id}}</p>
        {{-- <p class="adresseFibl">{{ucfirst($demande->anapack->nom)}}</p> --}}
      </td>
    </tr>
  </table>


</div>
