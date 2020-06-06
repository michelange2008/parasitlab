@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">

    <form action="{{ route('observations.update', $observation->id) }}" method="post">

      @csrf
      @method('put')
      {{-- Champs caché qui permet de savoir quel type demodification on apporte à l'observatin --}}
      <input type="hidden" name="type" value="anaacte">

      <div class="row my-3 justify-content-center">

        <div class="col-ld-11 col-lg-1à col-xl-9">

          @titre(['titre' => $observation->intitule, 'icone' => 'modifier.svg'])

        </div>

      </div>

      <div class="row justify-content-center">

        <div class="col-md-11 col-lg-10 col-xl-9">

          @foreach ($anatypes as $anatype)

            <ul class="list-group">

              <li class="list-group-item list-group-item-action list-group-item-dark rounded-0">{{ ucfirst($anatype->nom) }}</li>

              @foreach ($anatype->anaactes as $anaacte)

                <li class="list-group-item rounded-0">

                  <div class="form-group row">

                    @foreach ($anaactesAvecPoids as $anaacte_id => $frequence)

                      @if ($anaacte_id === $anaacte->id)

                        @php $poids = $frequence @endphp

                      @endif

                    @endforeach

                    <label class="col-sm-8 col-form-label
                    @if ($poids > 1 )
                      font-weight-bold color-bleu-tres-fonce
                    @elseif ($poids == 0)
                      font-weight-light text-secondary small
                    @else
                      font-weight-bold color-bleu
                    @endif
                    ">{{ ucfirst($anaacte->nom) }}</label>

                    <div class="col-sm-1">

                      <input type="number" class="form-control" name="anaacte_{{ $anaacte->id }}" value="{{ $poids }}">

                    </div>

                    @php $poids = 0 @endphp

                  </div>
                </li>

              @endforeach

            </ul>

          @endforeach
        </div>

      </div>

      <div class="row justify-content-center">

        <div class="col-md-11 col-lg-10 col-xl-9">

          @enregistreAnnule(['route' => route('observations.show', $observation->id)])

        </div>

      </div>

    </form>

  </div>

@endsection
