<div class="pdf-entete">
  <table class="" style="width:100%">
    <tr>
      <td>
        <img width="250px" src="images/logo.png" alt="Logo du labo">
        <p class="adresseFibl">{{ config('laboInfos.address_1') }}</p>
        <p class="adresseFibl">{{ config('laboInfos.address_2') }}</p>
      </td>
      <td style="text-align: right"">
        <p class="adresseFibl">@lang('demandes.signe_le') {{\Carbon\Carbon::parse($demande->date_signature)->isoFormat('DD/MM/Y')}}</p>
        <p class="adresseFibl">@lang('factures.ref'): {{$demande->id}}</p>
        <p class="adresseFibl">{{ucfirst($demande->anaacte->anatype->nom)}}</p>
      </td>
    </tr>
  </table>


</div>
