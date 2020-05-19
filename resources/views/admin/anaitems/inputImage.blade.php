{{-- Fragment destiné à afficher l'image qui doit être téléchargée avec le champs input  --}}
<img class="img-90" src="{{ url('storage/img/icones/oeufs/'.$anaitem->image) }}" alt="$anaitem->image">

<div class="input-group image-preview">

  <input type="hidden" name="image_default" value="{{ $anaitem->image }}">

  <input type="text" class="form-control image-preview-filename" disabled="disabled" > <!-- don't give a name === doesn't send on POST/GET -->

  <span class="input-group-btn">
    <!-- image-preview-clear button -->
    <button type="button" class="btn btn-default image-preview-clear" style="display:none;">

      <i class="fas fa-window-close text-danger"></i> @lang('form.del')

    </button>
    <!-- image-preview-input -->
    <div class="btn btn-default image-preview-input">

      <i class="fas fa-folder-open"></i>

      <span class="image-preview-input-title">@lang('form.browse')</span>

      <input type="file" accept="image/png, image/jpeg, image/gif" name="image_nouvelle"/> <!-- rename it -->

    </div>

  </span>

</div><!-- /input-group image-preview [TO HERE]-->

@section('scripts')

  <script src="{{ url('js/inputImage.min.js') }}"></script>

@endsection

@section('css')

  <link rel="stylesheet" href="{{ url('css/inputImage.min.css') }}">

@endsection
