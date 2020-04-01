{{-- Cette page fait partie de extranet/analyses/enpratique/prelever.blade.php

  Elle est contruite à partir du fichier terre_lot.json et des fichiers de traduction terre_lot.php

  Elle est amenée avec ses pages mères par le controller CoproscopiesController

 --}}

<ul class="list-unstyled">

  @foreach ($terre_lot->items as $item) {{-- On purcours les blocs --}}

    <li class="media">

      <img src="{{ url('storage/img').'/'.$item->image }}" alt="">

      <div class="media-body ml-3">

        <h4 class="mt-0 mb-1">{!! __($terre_lot->prefixe.$item->prefixe.'titre') !!}</h4> {{-- fichier est le nom du fichier de traduction
                                                                                                  bloc est le nom du bloc de texte dans le fichier de traduction --}}
        <p class="mb-1">{!! __($terre_lot->prefixe.$item->prefixe.'texte') !!}</p> {{-- prefixe est le préfixe des lignes de texte --}}

        <p class="small text-secondary">{!! __($terre_lot->prefixe.$item->prefixe.'remarque') !!}

      </div>

    </li>

    <hr class="divider-court">

  @endforeach

</ul>
