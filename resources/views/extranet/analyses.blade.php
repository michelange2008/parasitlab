@extends('layouts.app')

@extends('extranet.menuExtranet')

@section('content')

  <div class="container-fluid">

    <div class="row my-3">

      <div class="m-auto col">

        <div class="card-deck">

          @foreach ($analyses as $analyse)

            @include('extranet.analyses.carte', [
              'image' => $analyse->image,
              'titre' => __($analyse->prefixe.'titre'),
              'texte_1' => __($analyse->prefixe.'texte_1'),
              'texte_2' => __($analyse->prefixe.'texte_2'),
              'route' => $analyse->route,
            ])

          @endforeach

        </div>

      </div>

    </div>

  </div>

@endsection
