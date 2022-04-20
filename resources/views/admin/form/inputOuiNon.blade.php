<p>{{ ucfirst(__('form.'.$intitule)) }}</p>

<div class="custom-control custom-radio custom-control-inline">

  <input type="radio" id="{{ $name ?? 'nom' }}_oui" name="{{ $name ?? 'nom' }}"
          class="custom-control-input"
          value=1
          @isset($checked) @if($checked) checked @endif() @endisset()>

  <label class="custom-control-label" for="{{ $name ?? 'nom' }}_oui">@lang('form.oui')</label>

</div>

<div class="custom-control custom-radio custom-control-inline">

  <input type="radio" id="{{ $name ?? 'nom' }}_non" name="{{ $name ?? 'nom' }}"
          class="custom-control-input"
          value=0
          @isset($checked) @if(!$checked) checked @endif() @endisset()>

  <label class="custom-control-label" for="{{ $name ?? 'nom' }}_non">@lang('form.non')</label>

</div>
