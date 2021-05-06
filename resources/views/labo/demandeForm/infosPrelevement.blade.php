{{-- issu de infosAnalyseDemandee.blade --}}
<div class="form-group row my-3">

  <div class="col-md-12 mb-3">

    <span class="font-weight-bold">@lang('form.ax_prelev')</span>

  </div>

  <div class="col-md-4 ml-3">@lang('form.sontparasites')</div>

  <div class="col-md-7">

    @include('labo.demandeForm.inputEstParasite')

  </div>

</div>

<div class="form-group row px-3 my-3">

  <div class="col-md-4 ml-3">@lang('form.q_observation')</div>

  <div class="col-md-7">

    @foreach ($signes as $signe)

      <div class="custom-control custom-checkbox custom-control-inline">

        <input type="checkbox"

        class="custom-control-input"

        id="signe_{{ $i.'_'.$signe->id }}"

        name="signe_{{ $i }}[]"

        value="{{ $signe->id }}"

        @isset($prelevement->signes)

          @if ($prelevement->signes->contains($signe) == 1)

            checked

          @endif


        @endisset

        >

        <label class="custom-control-label" for="signe_{{ $i.'_'.$signe->id }}">@lang($signe->nom)</label>

      </div>

    @endforeach

  </div>

</div>
