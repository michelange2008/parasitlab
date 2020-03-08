<div class="form-group pl-3 border-left">

  <h5>Actes à facturer</h5>

  @isset($actes)

    @foreach ($actes as $acte)

      <div class="custom-control custom-checkbox">

        <input class="custom-control-input" type="checkbox" name="acte_{{ $acte->id }}" id="acte_{{ $acte->id }}" value="on">

        <label class="custom-control-label" for="acte_{{ $acte->id }}">{{ $acte->anaacte->nom }} ({{ $acte->nombre }})</label>

      </div>

    @endforeach

  @else

    <p class="color-rouge m-3">Aucun acte à facturer</p>

  @endisset

</div>
