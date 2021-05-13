{{-- Issu de PrelevementController@edit
Il y a un peu de réplication de code avec les vues sur la création d'un prélèvement.
Mais si on veut éviter cette redondance, cela implique que tous les éléments aient
un suffixe (n° du préèvement) ce qui complique la méthode update --}}
@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">

    <form class="" action="{{ route('prelevement.update', $prelevement->id) }}" method="post">

      @csrf

      @method('put')

      <div class="row my-3">

        <div class="col-md-10 mx-auto">

          @if ($prelevement->estMelange)

            @titre(['titre' => $prelevement->melange->nom, 'icone' => $prelevement->demande->espece->icone->nom])

          @else

            @titre(['titre' => $prelevement->animal->numero.' - '.$prelevement->animal->nom, 'icone' => $prelevement->demande->espece->icone->nom])

          @endif

        </div>

      </div>

      <div class="row">

        <div class="col-md-10 offset-md-1 mb-3">


            @if ($prelevement->estMelange)

              <h5>@lang('form.prelev_coll')

                @if ($prelevement->melange->animaux)


                  @foreach ($prelevement->melange->animals as $animal)

                    @if ($loop->first)

                      (n°{{ $animal->numero }},

                    @elseif ($loop->last)

                      {{ $animal->numero }})

                    @else

                      {{ $animal->numero }},

                    @endif

                  @endforeach

                @else

                   @lang('melange.sans_animaux')

                @endif

              </h5>


            @else

              <h5 for="numero">@lang('form.prelev_indiv')</h5>

          @endif

          <hr class="divider">

        </div>


      <div class="offset-md-1 col-md-10">

        <div class="form-inline">

          <label for="etatPrelevement">@lang('form.etat_prelev')</label>

          <select class="form-control mx-3" id="etatPrelevement" name="etatPrelevement">

            @foreach ($etats as $etat)

              @if(isset($prelevement))

                @if ($prelevement->etat_id == $etat->id)

                  <option value="{{ $etat->id }}" selected>{{$etat->nom}}</option>

                @else

                  <option value="{{ $etat->id }}">{{$etat->nom}}</option>

                @endif

              @else

                <option value="{{ $etat->id }}">{{$etat->nom}}</option>

              @endif

            @endforeach

          </select>

        </div>
      </div>

      <div class="offset-md-1 col-md-10">

        <div class="form-group row my-3">

          <div class="col-md-12 mb-3">

            <span class="font-weight-bold">@lang('form.ax_prelev')</span>

          </div>

          <div class="col-md-4 ml-3">@lang('form.sontparasites')</div>

          <div class="col-md-7">

            @foreach ($estParasite as $reponse)

              <div class="custom-control custom-radio custom-control-inline">

                <input type="radio" id="{{ $reponse->id }}"

                        name="{{ $reponse->groupe }}"

                        class="custom-control-input"

                        value="{{ $reponse->value }}"

                        {{-- il faut mettre son état parasite --}}
                        @if ($reponse->id === $prelevement->parasite)

                          checked="checked"

                        @endif

                    >

                <label class="custom-control-label" for="{{ $reponse->id }}">{!! ucfirst(__($reponse->texte)) !!}</label>

              </div>

            @endforeach

          </div>

        </div>

        <div class="form-group row px-3 my-3">

          <div class="col-md-4 ml-3">@lang('form.q_observation')</div>

          <div class="col-md-7">

            @foreach ($signes as $signe)

              <div class="custom-control custom-checkbox custom-control-inline">

                <input type="checkbox"

                class="custom-control-input"

                id="signe_{{ $signe->id }}"

                name="signe[]"

                value="{{ $signe->id }}"

                @isset($prelevement->signes)

                  @if ($prelevement->signes->contains($signe) == 1)

                    checked

                  @endif


                @endisset

                >

                <label class="custom-control-label" for="signe_{{ $signe->id }}">@lang($signe->nom)</label>

              </div>

            @endforeach

          </div>

        </div>

      </div>

      <div class="col-md-10 offset-md-1">

        @enregistreAnnule()

      </div>

    </form>

    <div class="col-md-10 offset-md-1">

      <hr class="divider">

    </div>

@endsection
