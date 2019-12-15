<div class="d-flex alert alert-bleu rounded-0">

  <h3 class="pt-3 ml-3">{{ ucfirst($titre) ?? '' }}
    <small>
      @isset($soustitre)

        {{ $soustitre ?? ''}}

      @endisset
  </small>
  </h3>

</div>
