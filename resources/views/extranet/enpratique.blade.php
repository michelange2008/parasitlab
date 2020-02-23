@extends('layouts.app')

@extends('extranet.menuExtranet')

@section('content')

  <div class="container-fluid">

    <div class="row my-3">

      <div class="col-md-10 mx-auto">

        @titre(['icone' => 'enpratique.svg', 'titre' => 'En pratique', 'soustitre' => '(comment prélever & envoyer dans les meilleures conditions)'])

      </div>

    </div>

    <div class="row my-3">

      <div class="col-md-10 mx-auto">

        <ul class="nav nav-tabs lead" id="enpratiqueTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="preleverTab" role="tab" aria-controls="prelever" aria-selected="true" href="#prelever"><i class="fab fa-stack-overflow"></i> Comment prélever ?</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="envoyerTab" role="tab" aria-controls="envoyer" aria-selected="false" href="#envoyer"><i class="far fa-paper-plane"></i> Comment envoyer ?</a>
          </li>
        </ul>

        <div class="tab-content" id="enpratiqueContent">
          <div class="tab-pane fade show active" id="prelever" role="tabpanel" aria-labelledby="preleverTab">Prélever</div>
          <div class="tab-pane fade" id="envoyer" role="tabpanel" aria-labelledby="envoyerTab">Envoyer</div>
        </div>
      </div>

    </div>
{{-- @foreach ($texte as $element)

<div class="row my-3">

      <div class="col-md-10 mx-auto border py-3">

        <ul class="list-unstyled">

          <li class="media">

            <img class="d-none d-sm-block" src="{!! asset('storage/img/icones').'/'.$element->icone !!}" alt="{{$element->fond}}">

            <div class="media-body">
              <p class="h4">{{$element->titre}}</p>
              <ul class="lead">
                <p class="titre-fond ">{{ $element->fond }}</p>
                @foreach ($element->items as $item)

                  <li><span class="font-weight-bold color-bleu-tres-fonce">{{ $item->important }}</span> {{ $item->autre }}</li>

                @endforeach
              </ul>
            </div>
          </li>
        </ul>

      </div>

    </div>

  @endforeach --}}



  </div>

@endsection
