<div class="form-group pl-3 border-left">
{{-- Merdier incompréhensible car le rendu fait que la ligne ci-dessous encadre tout le reste de la vue --}}
  <p>@lang('factures.analyses_a_facturer')</p>
  <h5>@lang('factures.analyses_a_facturer')</h5>

  @isset($demandes)

      @forelse ($demandes as $demande)

        <div class="custom-control custom-checkbox">

          <input class="custom-control-input case_demande" type="checkbox" name="demande_{{ $demande->id }}" id="demande_{{ $demande->id }}" value="on">

          <label class="custom-control-label my-1" for="demande_{{ $demande->id }}">
            <p class="font-weight-bold mb-0">{!! ucfirst($demande->anaacte->anatype->nom) !!}</p>
            <p class="mb-0">{!! ucfirst($demande->anaacte->nom) !!}</p>
            <p class="mb-0 font-italic">{{ \Carbon\Carbon::parse($demande->date_reception)->isoFormat('LL') }}</p>
          </label>

        </div>

      @empty

        <h4>@lang('factures.rien')</h4>

      @endforelse

    @else

      <p class="color-rouge m-3">@lang('factures.zero_analyse_a_facturer')</p>

    @endisset

</div>
