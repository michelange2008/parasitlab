@extends('labo.melanges.melangeCreateEdit')

@section('titre')

  @titre(['titre' => $melange->nom, 'icone' => 'mela_add.svg'])

@endsection

@section('animaux')


    <div class="form-row">

      <div class="col-md-4 offset-md-1">

        <p class="font-weight-bold" colspan="3">@lang('form.animal_dans_melange')</p>

        <div id="liste-in" melange="{{ $melange->id }}" troupeau="{{ $melange->troupeau->id }}" class="list-group liste-animals">

          @foreach ($animals as $animal)


              <div id="animalIn_{{ $animal->id }}" class="animal-melange in-melange
                @if (!$melange->animals->contains($animal->id))
                  collapse
                @endif
                ">

                <button type="button" id='animal_{{ $animal->id }}' class="m-1 p-3 border btn btn-info text-left w-100" title="{{ $animal->id }}">
                  {{ $animal->numero }}
                  @isset($animal->nom)
                    ({{ $animal->nom }})
                  @endisset
                </button>

              </div>


          @endforeach

        </div>

      </div>

      <div class="offset-md-1 col-md-4">
        <p class="font-weight-bold" colspan="3">@lang('form.add_animal')</p>

        <div id="liste-out" class="list-group liste-animals">

          @foreach ($animals as $animal)


              <div id="animalOut_{{ $animal->id }}" class="animal-melange in-melange
                @if ($melange->animals->contains($animal->id))
                  collapse
                @endif
                ">

                <button type="button" id='animal_{{ $animal->id }}' class="m-1 p-3 border btn btn-light text-left w-100" title="{{ $animal->id }}">
                  {{ $animal->numero }}
                  @isset($animal->nom)
                    {{ $animal->nom }})
                  @endisset
                </button>

              </div>


          @endforeach

        </div>


      </div>

      <div class="col-md-10 offset-md-1">

        @include('fragments.boutonAnnule', ['nomAnnule' => __('boutons.fermer')])

      </div>

    </div>

@endsection

@section('scripts')

  <script src="{{url('js/melangeManager.js')}}"></script>

@endsection
