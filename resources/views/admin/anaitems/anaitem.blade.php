@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">

    <div class="row justify-content-center my-3">

      <div class="col-md-11 col-lg-10 col-xl-9">

        @titre(['titre' => ucfirst($anaitem->nom), 'icone' => 'oeufs/'.$anaitem->image])

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-7 col-lg-6 col-xl-5">

        <form id="form_anaitem" action="{{ route('anaitems.update', $anaitem->id) }}" method="post">

          @csrf

          @method('PUT')

            <div class="form-row">

              <div class="form-group col-md-4">

                <label for="abbreviation">@lang('form.abbr')</label>
                <input type="text" class="form-control" name="abbreviation" maxlength="4" value="{{ old('abbreviation') ?? $anaitem->abbreviation }}">

              </div>

              <div class="form-group col-md-8">

                <label for="nom">@lang('form.nom')</label>
                <input type="text" class="form-control" name="nom" value="{{ old('nom') ?? $anaitem->nom }}">

              </div>

            </div>

            <div class="form-row">

              <div class="form-group col-md-6">
                <label for="unite">@lang('form.unites')</label>
                <select id="unite" name="unite" class="form-control">
                  {{-- <option selected>@lang('form.choisir')</option> --}}
                  @foreach ($unites as $unite)

                    @if ($anaitem->unite_id == $unite->id)

                      <option value = "{{ $unite->id }}" selected>{{ $unite->type }} : {{ $unite->nom }}</option>

                    @endif

                    <option value = "{{ $unite->id }}" >{{ $unite->type }} : {{ $unite->nom }}</option>

                  @endforeach
                </select>

              </div>


              <div class="form-group col-md-4">

                <label for="qtt">@lang('form.valeurs')</label>
                <select id="qtt" name="qtt" class="form-control">
                  {{-- <option selected>@lang('form.choisir')</option> --}}
                  @foreach ($qtts as $qtt)

                    @if ($anaitem->qtt_id == $qtt->id)

                      <option value="{{ $qtt->id }}" selected>{{ $qtt->nom }}</option>

                    @else

                      <option value="{{ $qtt->id }}">{{ $qtt->nom }}</option>

                    @endif

                  @endforeach
                </select>

              </div>

              @enregistreAnnule()

            </div>

        </form>

      </div>

      <div class="col-md-4 col-lg-4 col-xl-4 border-left">

        <h4 class="text-center">Modification des paramètres</h4>

      </div>

    </div>

  </div>

@endsection
