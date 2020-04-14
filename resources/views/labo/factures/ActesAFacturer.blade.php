<div class="form-group pl-3 border-left">

  <h5>@lang('factures.actes_a_facturer')</h5>

  @isset($actes)

    @foreach ($actes as $acte)

      <div class="custom-control custom-checkbox">

        <input class="custom-control-input" type="checkbox" name="acte_{{ $acte->id }}" id="acte_{{ $acte->id }}" value="on">

        <label class="custom-control-label" for="acte_{{ $acte->id }}">
          <span class="font-weight-bold">{{ ucfirst($acte->anaacte->nom) }}</span> ({{ $acte->nombre }})</label>

      </div>

    @endforeach

  @else

    <p class="color-rouge m-3">@lang('factures.zero_acte_a_facturer')</p>

  @endisset

</div>
