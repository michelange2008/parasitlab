<div class="pdf-entete">



        <img width="250px" src="images/logo.png" alt="Logo du labo"/>

        <p class="adresseFibl">{{ config('laboInfos.address_1') }}</p>

        <p class="adresseFibl">{{ config('laboInfos.address_2') }}</p>



        <p style="text-align: right" class="adresseFibl">@lang('factures.date_facture'): {{\Carbon\Carbon::parse($elementDeFacture->facture->faite_date)->isoFormat('LL')}}</p>

        <p style="text-align: right" class="adresseFibl">@lang('factures.ref') {{$elementDeFacture->facture->id}}</p>

