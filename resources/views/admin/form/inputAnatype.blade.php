<div class="form-group">

  <select id="anatype_id" class="form-control @error('anatype_id') is-invalid @enderror"

    name="anatype_id" required>

    <option selected disabled>@lang('form.choix_anatype')</option>

    @foreach ($anatypes as $anatype)

        <option value="{{ $anatype->id }}">{{ $anatype->nom }}</option>

    @endforeach

  </select>

</div>
