<div class="form-group">

  <label for="{{ $nom }}">{{ $label }}</label>

  <textarea class="form-control"

          name="{{ $nom }}" id="{{ $nom }}"

          rows = "3"

          required={{ $required }}>{{ old( $nom ) ?? $value }}</textarea>

          @error( $nom )
            <div class="invalid">@lang('Il faut une valeur qui n\'est pas déjà existance')</div>
          @enderror

</div>
