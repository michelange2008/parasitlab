<div class="form-group">

  <select class="form-control" name="espece_id" required>

    <option selected disabled>@lang('form.choix_espece')</option>

    @foreach ($especes as $espece)

      @if ($espece->id === ($espece_id_anterieure ?? '-'))

        <option selected value="{{ $espece->id }}">{{ $espece->nom }}</option>

      @else

        <option value="{{ $espece->id }}">{{ $espece->nom }}</option>

      @endif

    @endforeach

  </select>

</div>
