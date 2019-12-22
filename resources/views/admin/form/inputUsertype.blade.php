<div class="form-group">

  @foreach ($usertypes as $usertype)

    <div class="custom-control custom-radio custom-control-inline">
      <input type="radio" name="usertype" id="usertype_{{ $usertype->id }}" class="custom-control-input"  value="{{ $usertype->id }}">
      <label class="custom-control-label" for="usertype_{{ $usertype->id }}">{{ $usertype->nom }}</label>
       {{-- {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!} --}}
    </div>

  @endforeach

</div>
