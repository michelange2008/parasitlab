<div class="form-group">

  <label for="">@lang('form.'.$label)</label>

  <div class="p-3 border bg-bleu text-white">

    @foreach ($items as $item)

      <div class="custom-control custom-checkbox">

        <input type="checkbox" class="custom-control-input" id="{{ $item->nom }}" name="{{ $groupe }}_{{ $item->id }}">

        <label class="custom-control-label" for="{{$item->nom}}">{{ $item->nom }}</label>
      </div>

    @endforeach

  </div>

</div>
