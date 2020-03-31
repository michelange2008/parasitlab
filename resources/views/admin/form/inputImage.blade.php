<input type="file" class="custom-file-input" name="{{ $name ?? 'image' }}" id="{{ $id ?? 'image'}}" accept=".jpg, .png, .jpeg, .svg">

<label class="custom-file-label" for="{{ $name ?? 'image' }}">@lang('form.choose_picture')</label>


@error('image')

  <div class="alert alert-danger">{{ $message }}</div>

@enderror
