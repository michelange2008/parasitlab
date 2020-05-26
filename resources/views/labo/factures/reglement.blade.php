<h4>{{ ucfirst(__('factures.paiement')) }}</h4>

<form class="" action="{{ route('reglement.store') }}" method="post">

  @csrf

  <input type="hidden" name="facture_id" value="{{ $elementDeFacture->facture->id }}">

  <div class="row flex-row">

    <div class=" col form-group">

      <label for="modereglement">@lang('factures.mode_reglement')</label>

      <select class="form-control" name="modereglement_id">

        @foreach ($modereglements as $modereglements)

          <option value="{{ $modereglements->id }}">{{ $modereglements->nom }}</option>

        @endforeach

      </select>

    </div>

    <div class="col form-group">

      <label for="payee_date">@lang('factures.date_paiement')</label>

      <input class="form-control" type="date" name="payee_date" value="{{ \Carbon\Carbon::now()->toDateString() }}">

    </div>

  </div>

  @include('fragments.boutonEnregistre')

</form>
