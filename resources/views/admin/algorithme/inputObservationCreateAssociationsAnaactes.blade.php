<div class="form-group">

  <label for="">@lang('form.observation_association_anatypes')</label>

  @foreach ($anatypes as $anatype)

    <div class="mb-3 ml-5 border p-3">

          <div class="ml-3 custom-control custom-checkbox">

            <input type="checkbox" class="custom-control-input" id="{{ $anatype->nom }}" name="anatypes_{{ $anatype->id }}">

            <label class="custom-control-label" for="{{$anatype->nom}}">{{ ucfirst($anatype->nom) }}</label>

          </div>

    </div>

  @endforeach

</div>
