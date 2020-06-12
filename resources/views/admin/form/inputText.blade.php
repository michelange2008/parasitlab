<div class="form-group">

  <label for="{{ $nom }}">@lang('form.'.$label)</label>

  <input class="form-control" type="text"

          name="{{ $nom }}" id="{{ $nom }}"

          value="{{ old( $nom ) ?? $value }}"

          maxlength="{{ $maxlength ?? 191 }}"

          required={{ $required }}

          placeholder="{{ $placeholder ?? '' }}"

          >

          @error( $nom )
            <div class="invalid">@lang('Il faut une valeur qui n\'est pas déjà existante')</div>
          @enderror

</div>
