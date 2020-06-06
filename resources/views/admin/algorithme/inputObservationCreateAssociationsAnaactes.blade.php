<div class="form-group">

  <label for="">@lang('form.observation_association_anaactes')</label>

  @foreach ($anatypes as $anatype)

    <div class="mb-3 ml-5 border p-3">

      <h5 class="text-secondary">{{ ucfirst($anatype->nom) }}</h5>

      @foreach ($anaactes as $anaacte)

        @if ($anaacte->anatype_id === $anatype->id)

          <div class="ml-3 custom-control custom-checkbox">

            <input type="checkbox" class="custom-control-input" id="{{ $anaacte->nom }}" name="anaactes_{{ $anaacte->id }}">

            <label class="custom-control-label" for="{{$anaacte->nom}}">{{ ucfirst($anaacte->nom) }}</label>

          </div>

        @endif

      @endforeach

    </div>

  @endforeach

</div>
