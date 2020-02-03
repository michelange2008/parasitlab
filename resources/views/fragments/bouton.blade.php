@if (isset($type) && $type == 'mail')

  @include('fragments.boutonMailTo')

@elseif (isset($type) && $type == 'link')



@elseif (isset($type) && $type == 'phone')

  <div class="btn btn-bleu" type="button" name="button">

    <i class="fas fa-phone"></i>

    {{ $intitule }}

  </div>

@endif
