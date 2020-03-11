<div class="d-flex alert alert-bleu">

  @if (isset($icone))

    <img class="img-50" src="{!! url('storage/img/icones/'.$icone) !!}" alt="{{ $icone }}">

  @endif

  <h3 class="pt-3 ml-3">{{ ucfirst($titre) ?? '' }}
    <small>
      @isset($soustitre)

        {{ $soustitre ?? ''}}

      @endisset
  </small>
  </h3>

</div>
