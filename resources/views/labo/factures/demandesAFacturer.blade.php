<div class="form-group pl-3 border-left">
{{-- Merdier incompréhensible car le rendu fait que la ligne ci-dessous encadre tout le reste de la vue --}}
  <p>@lang('factures.analyses_a_facturer')</p>
  <h5>@lang('factures.analyses_a_facturer')</h5>

  @isset($demandes)

      @foreach ($demandes as $demande)

        <div class="custom-control custom-checkbox">

          <input class="custom-control-input" type="checkbox" name="demande_{{ $demande->id }}" id="demande_{{ $demande->id }}" value="on">

          <label class="custom-control-label my-1" for="demande_{{ $demande->id }}">
            <p class="font-weight-bold mb-0">{!! ucfirst($demande->anaacte->anatype->nom) !!}</p>{!! ucfirst($demande->anaacte->nom) !!} - {{ $demande->date_reception }}
          </label>

        </div>

      @endforeach

    @else

      <p class="color-rouge m-3">@lang('factures.zero_analyse_a_facturer')</p>

    @endisset

</div>
