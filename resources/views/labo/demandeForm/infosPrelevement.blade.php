{{-- issu de infosAnalyseDemandee.blade --}}
<div class="form-group row px-3 my-3">

  <div class="col-md-12 mb-3">

    <span class="font-weight-bold">@lang('form.ax_prelev')</span>

  </div>

  <div class="col-md-4 ml-3">@lang('form.sontparasites')</div>

  <div class="col-md-7">

    @foreach ($estParasite as $reponse)

      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" id="{{ $reponse->id }}_{{ $i }}"
                name="{{ $reponse->groupe }}_{{ $i }}"
                class="custom-control-input"
                value="{{ $reponse->value }}"
                @if ($reponse->id == "saispas")
                  checked="checked"
                @endif >
        <label class="custom-control-label" for="{{ $reponse->id }}_{{ $i }}">{!! ucfirst(__($reponse->texte)) !!}</label>
      </div>

    @endforeach

  </div>

</div>
<div class="form-group row px-3 my-3">

<div class="col-md-4 ml-3">@lang('form.q_observation')</div>

<div class="col-md-7">

  @foreach ($signes as $signe)

    <div class="custom-control custom-checkbox custom-control-inline">
      <input type="checkbox" class="custom-control-input" id="{{ $i.'_'.$signe->id }}" name="signe{{ $i.'_'.$signe->id }}">
      <label class="custom-control-label" for="{{ $i.'_'.$signe->id }}">@lang($signe->nom)</label>
    </div>

  @endforeach
</div>

</div>
