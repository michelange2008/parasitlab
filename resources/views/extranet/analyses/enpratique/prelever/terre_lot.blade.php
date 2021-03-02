{{-- Cette page fait partie de extranet/analyses/enpratique/prelever.blade.php

  Elle est contruite à partir du fichier terre_lot.json et des fichiers de traduction terre_lot.php

  Elle est amenée avec ses pages mères par le controller AnalysesController

 --}}

<ul class="list-unstyled">

  @foreach ($terre_lot->items as $item) {{-- On parcours les blocs --}}

    <li class="media">

      <img src="{{ url('storage/img/analyses/preleverenvoyer/'.$item->image) }}" alt="biology">

      <div class="media-body ml-3">

        <h4 class="mt-0 mb-1">{!! __($terre_lot->prefixe.$item->prefixe.'titre') !!}</h4> {{-- fichier est le nom du fichier de traduction
                                                                                                  bloc est le nom du bloc de texte dans le fichier de traduction --}}
        <p class="mb-1">
          {!! __($terre_lot->prefixe.$item->prefixe.'texte') !!} {{-- prefixe est le préfixe des lignes de texte --}}
          @if ($loop->first) {{-- si c'est la première itération, il faut mettre le lien vers les fiches de prélèvement --}}
            (<a href="{{url('storage/pdf/fiche_prelev_rum.pdf')}}" target="blank">
              <i class='text-danger fas fa-file-pdf'></i>
              <span class="small"> Ruminants, </span>
            </a>
            <a href="{{url('storage/pdf/fiche_prelev_equ.pdf')}}" target="blank">
              <i class='text-danger fas fa-file-pdf'></i>
              <span class="small"> Equidés</span>
            </a>)
          @endif
        </p>

        <p class="small text-secondary">{!! __($terre_lot->prefixe.$item->prefixe.'remarque') !!}

      </div>

    </li>

    <li><hr class="divider-court"></li>

  @endforeach

</ul>
