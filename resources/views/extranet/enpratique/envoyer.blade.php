<div class="col-md-12 mx-3 py-3">

  <ul class="list-unstyled">

    @foreach ($enpratiqueConserve as $element)

      <li class="media my-3">

        <img class="d-none d-sm-block img-thumbnail" src="{!! asset('storage/img/icones').'/'.$element->image !!}" alt="{{ $element->image }}">

        <div class="media-body ml-3 pt-2">

          <h4>{{ $element->h4 }}</h4>

          <ul class="lead">

            <p class="titre-fond">{{ $element->titre_fond }}</p>

            @foreach ($element->p as $p)

              <li>
                <span class="font-weight-bold color-bleu-tres-fonce">
                    {{ $p->gras }}
                </span>
                  {{ $p->normal }}
              </li>

            @endforeach

          </ul>

        </div>

      </li>

    @endforeach

  </ul>

</div>

<div class="col-12 my-3">

  <p class="h3">A vous de jouer !</p>

  <div class="card-deck">

    @foreach ($enpratiqueEnvoi as $element)

        <div class="card">
          <img src="{!! asset('storage/img/icones').'/'.$element->icone !!}" alt="">
          <div class="card-body">
            <h4>{{ $element->h4 }}</h4>
            <p>{{ $element->p1 }}</p>
            <p>{{ $element->p2 }}</p>
            <p>{{ $element->p3 }}</p>
          </div>
          <div class="card-footer">
            @if ($element->type == 'route')

              {!! link_to_route($element->route, $element->libelle, '' ,['class' => 'btn btn-bleu'])!!}


            @elseif ($element->type == 'mail')

              {!! HTML::mailto($element->mail, $element->libelle, ['class' => 'btn btn-bleu']) !!}

            @else

              {!! link_to_asset('storage/'.$element->file, $element->libelle, ['class' => 'btn btn-bleu']) !!}

            @endif
          </div>
        </div>
    @endforeach

  </div>

</div>
