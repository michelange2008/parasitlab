@foreach ($enpratiquePrelever as $element)

  <div class="media border p-3 mb-2  bg-bleu-tres-clair">
    <img class="mr-3 d-none d-md-block" src="{!! 'storage/img/icones/'.$element->icone !!}" alt="Problème">
    <div class="media-body">
      <h3 class="mt-0">
        {{ $element->titre }}
      </h3>
      <p class="lead">{{ $element->soustitre }}</p>

      <div class="d-md-flex flex-row">

        @isset($element->qui)

          <div class="col-md-6 border-left">

            <p class="lead"><i class="far fa-hand-point-right"></i> Qui prélever&nbsp? </p>

            @foreach ($element->qui as $qui)

              <p>{{ $qui }}</p>

            @endforeach

          </div>

        @endisset

        @isset($element->quand)

          <div class="col-md-6 border-left">

            <p class="lead"><i class="far fa-calendar-alt"></i> Quand prélever&nbsp? </p>

            @foreach ($element->quand as $quand)

              <p>{{ $quand }}</p>

            @endforeach

          </div>
        @endisset


      </div>

    </div>

  </div>

@endforeach
