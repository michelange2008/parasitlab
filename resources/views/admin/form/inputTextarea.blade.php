<div class="form-group">

  <label for="{{ $nom }}">{{ucfirst(__('form.'.$label))}}</label>

  <textarea class="form-control"

    name="{{ $nom }}" id="{{ $nom }}"

    rows = {{ $rows ?? "3"}}

    required={{ $required ?? true }}

    placeholder={{ __('form.'.($placeholder ?? '')) }}

    >{{ old( $nom ) ?? $value }}</textarea>

@error( $nom )
  <div class="invalid">@lang('form.erreur_existe')</div>
@enderror

</div>
