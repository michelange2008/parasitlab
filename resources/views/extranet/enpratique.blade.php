@extends('layouts.app')

@extends('extranet.menuExtranet')

@section('content')

  <div class="container-fluid">

    <div class="row my-3">

      <div class="col-md-10 mx-auto">

        @titre(['icone' => 'enpratique.svg', 'titre' => 'En pratique', 'soustitre' => '(comment prélever & envoyer dans les meilleures conditions)'])

      </div>

    </div>
@foreach ($texte as $element)

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

                  <li>{{ $item->important }} {{ $item->autre }}</li>

                @endforeach
              </ul>
            </div>
          </li>
        </ul>

      </div>

    </div>

  @endforeach



  </div>

@endsection
