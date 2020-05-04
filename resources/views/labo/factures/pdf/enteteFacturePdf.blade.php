<div class="pdf-entete">

  <table class="" style="width:100%">

    <tr>

      <td>

        <img width="250px" src="{{ url('storage/logo.svg') }}" alt="Logo du labo">

        <p class="adresseFibl">{{ $laboInfos['address_1']}}</p>

        <p class="adresseFibl">{{ $laboInfos['address_2']}}</p>

      </td>

      <td class="text-right">

        <p class="adresseFibl">@lang('factures.date_facture'): {{\Carbon\Carbon::parse($elementDeFacture->facture->faite_date)->isoFormat('LL')}}</p>

        <p class="adresseFibl">@lang('factures.ref') {{$elementDeFacture->facture->id}}</p>

      </td>

    </tr>

  </table>

</div>
