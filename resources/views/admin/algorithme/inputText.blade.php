<div class="form-group">

  <label for="{{ $nom }}">{{ $label }}</label>

  <input class="form-control" type="text"

          name="{{ $nom }}" id="{{ $nom }}"

          value="{{ old( $nom ) ?? $value }}"

          maxlength="{{ $maxlength ?? 191 }}"

          required={{ $required }}>

          @error( $nom )
            <div class="invalid">@lang('Il faut une valeur qui n\'est pas déjà existance')</div>
          @enderror

</div>
