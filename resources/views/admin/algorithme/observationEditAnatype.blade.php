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
      <input type="hidden" name="type" value="anatype">

      <div class="row my-3 justify-content-center">

        <div class="col-ld-11 col-lg-1à col-xl-9">

          @titre(['titre' => $observation->intitule, 'icone' => 'modifier.svg'])

        </div>

      </div>

      <div class="row justify-content-center">

        <div class="col-md-11 col-lg-10 col-xl-9">


            <ul class="list-group">


              @foreach ($anatypes as $anatype)

                <li class="list-group-item rounded-0">

                  <div class="form-group row">

                    @foreach ($anatypesAvecPoids as $anatype_id => $frequence)

                      @if ($anatype_id === $anatype->id)

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
                    ">{{ ucfirst($anatype->nom) }}</label>

                    <div class="col-sm-1">

                      <input type="number" class="form-control" name="anatype_{{ $anatype->id }}" value="{{ $poids }}">

                    </div>

                    @php $poids = 0 @endphp

                  </div>
                </li>

              @endforeach

            </ul>

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
