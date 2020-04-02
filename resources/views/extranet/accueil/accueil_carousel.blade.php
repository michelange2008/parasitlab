{{-- issu de ExtranetController@accueil avec utilisation du fichier carousel.jso et lang accueil.php --}}
<div id="accueilCarousel" class="carousel slide" data-ride="carousel">

  <ol class="carousel-indicators">

    @foreach ($carousel as $element)

      @if ($element->index === 0)

        <li data-target="#accueilCarousel" data-slide-to="{{ $element->index }}" class="active"></li>

      @else

        <li data-target="#accueilCarousel" data-slide-to="{{ $element->index }}"></li>

      @endif

    @endforeach

  </ol>

  <div class="carousel-inner">

    @foreach ($carousel as $element)

      @if ($loop->first)

        <div class="carousel-item active">

        @else

          <div class="carousel-item">

          @endif

          <img class="w-100" src="{{ url('storage/img'.'/'.$element->image) }}" alt="brebis">

          <div class="carousel-caption d-none d-md-block bandeau-bleu-tres-fonce text-left text-white">

            <h2 class="text-white">@lang($element->texte)</h2>

          </div>

        </div>

      @endforeach

  </div>

</div>
