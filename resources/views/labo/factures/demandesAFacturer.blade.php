<div class="form-group pl-3 border-left">

  <h5>Analyses à facturer</h5>

  @isset($demandes)

      @foreach ($demandes as $demande)

        <div class="custom-control custom-checkbox">

          <input class="custom-control-input" type="checkbox" name="demande_{{ $demande->id }}" id="demande_{{ $demande->id }}" value="on">

          <label class="custom-control-label" for="demande_{{ $demande->id }}">{{ $demande->anapack->nom }} ({{ $demande->date_reception }})</label>

        </div>

      @endforeach

    @else

      <p class="color-rouge m-3">Aucune analyse à facturer</p>

    @endisset

</div>
