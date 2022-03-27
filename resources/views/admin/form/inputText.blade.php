<div class="form-group">

  <label for="{{ $nom }}">@lang('form.'.$label)</label>

  <input class="form-control" type="{{ $type ?? 'num' }}"

          name="{{ $nom }}" id="{{ $nom }}"

          value="{{ old('nom') ?? $value }}"

          maxlength="{{ $maxlength ?? 191 }}"

          @isset($required)

            @if ($required)

              required

            @endif

          @endisset

          placeholder="{{ $placeholder ?? '' }}"

          step = {{ $step ?? "0.1" }}

          >

          @error( $nom )
            <div class="invalid">@lang('Il faut une valeur qui n\'est pas déjà existante')</div>
          @enderror

</div>
