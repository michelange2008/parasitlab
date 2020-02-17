  <label class="col-form-label" for="{{ $for }}">{{ $label }}</label>

  <div class="input-group my-2">

    <span class="input-group-text"><i class="material-icons">local_hospital</i></span>

    <input type="{{ $type }}" class="form-control" name="{{ $for }}" value="{{ $value ?? "" }}" placeholder="{{ $placeholder ?? "" }}">

  </div>
