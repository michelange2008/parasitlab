<div class="p-3 alert-secondary">

  <h4>@lang('tableaux.reglement')</h4>

  @if ($elementDeFacture->facture->payee)

    @lang('factures.facture_payee_le') {{ $elementDeFacture->facture->reglement->date_reglement }} @lang('commun.par') {{ $elementDeFacture->facture->reglement->modereglement->nom }}

  @else

    @if(Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse($elementDeFacture->facture->faite_date)->addMonth(1), false) < 0 )

      <p class="text-danger font-weight-bold">

        <i class="fas fa-exclamation-triangle"> </i>

        @lang('factures.facture_a_regler') {{ \Carbon\Carbon::parse($elementDeFacture->facture->faite_date)->addMonth(1)->isoFormat('LL') }}

      </p>

    @else

      <p>

        @lang('factures.facture_a_regler') {{ \Carbon\Carbon::parse($elementDeFacture->facture->faite_date)->addMonth(1)->isoFormat('LL') }}

      </p>

    @endif

    <small class="font-italic ml-1">

      - @lang('factures.mode_reglement') (<a class="text-secondary" href="{{ url('storage/pdf/rib.pdf') }}"><i class="fas fa-download"></i> @lang('factures.rib')</a>)

    </small>

  @endif

</div>
