<div class="form-group">

  <select class="form-control" name="typeprod_id" required>

    <option selected disabled>@lang('form.choix_typeprod')</option>

    @foreach ($typeprods as $typeprod)

      @if ($typeprod->id === ($typeprod_id_anterieure ?? '-'))

        <option selected value="{{ $typeprod->id }}">{{ $typeprod->nom }}</option>

      @else

        <option value="{{ $typeprod->id }}">{{ $typeprod->nom }}</option>

      @endif

    @endforeach

  </select>

</div>
