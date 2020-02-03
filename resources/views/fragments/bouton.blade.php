@if (isset($type) && $type == 'mail')

  @include('fragments.boutonMailTo')

@elseif (isset($type) && $type == 'link')

  <a class="btn btn-bleu" href="{{ $lien }}" target="_blank" >

    <i class="{{ $fa }}"></i>

    {{ $intitule }}

  </a>

@elseif (isset($type) && $type == 'phone')

  <div class="btn btn-bleu" type="button" name="button">

    <i class="fas fa-phone"></i>

    {{ $intitule }}

  </div>

@else



@endif
