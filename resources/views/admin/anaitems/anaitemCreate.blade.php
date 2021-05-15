@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">

    <div class="row my-3">

      <div class="mx-auto col-md-11 col-lg-9 col-xl-9">

        @titre(['titre' => __('titres.anaitem_create'), 'icone' => 'parasitisme.svg'])

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-11 col-lg-9 col-xl-9">

        <form action="{{ route('anaitems.store') }}" method="post"  enctype="multipart/form-data">

          @csrf

          <div class="form-row">

            <div class="form-group col-md-4">
              {{-- champs abbréviation --}}
              <label for="abbreviation">@lang('form.abbr')</label>
              <input type="text" class="form-control" name="abbreviation" maxlength="4" value="{{ old('abbreviation') }}">

            </div>

            <div class="form-group col-md-8">
              {{-- champs nom --}}
              <label for="nom">@lang('form.nom')</label>

              <input type="text" class="form-control" name="nom" value="{{ old('nom') }}">

            </div>

          </div>

          <div class="form-row">
            {{-- champs unite --}}
            <div class="form-group col-md-4">

              <label for="unite">@lang('form.unites')</label>

              <select id="unite" name="unite" class="form-control">

                <option value="" disabled selected>@lang('form.choisir')</option>

                @foreach ($unites as $unite)

                  <option value = "{{ $unite->id }}" >@lang($unite->type) : @lang($unite->nom)</option>

                @endforeach

              </select>

            </div>


            <div class="form-group col-md-4">
              {{-- type d'unité valeur, estimation, presence  --}}
              <label for="qtt">@lang('form.valeurs')</label>

              <select id="qtt" name="qtt" class="form-control">

                <option value="" disabled selected>@lang('form.choisir')</option>

                @foreach ($qtts as $qtt)

                    <option value="{{ $qtt->id }}">@lang($qtt->nom)</option>

                @endforeach

              </select>

            </div>

            <div id='multiple' class="form-group col collapse">

              <label for="multiple">Multiple pour obtenir les opg</label>

              <input class="form-control" type="number" min=1 step=1 name="multiple" value="null">

            </div>

          </div>

          <div class="form-row">

            <div class="col-md-12">

              @inputImage( [
                'nouveau' => true,
                'name' => 'image'
              ])

            </div>

          </div>

          <div id="anaitem_enregistre">

            @enregistreAnnule(['route' => route('anaitems.index')])

          </div>

      </form>

    </div>

  </div>

  <div class="row justify-content-center my-3">

    <div class="col-md-4 col-lg-4 col-xl-4 bg-light">

      @include('admin.anaitems.uniteCreate')

    </div>


  </div>

</div>

@endsection

@section('scripts')

<script src="{{url('js/anaitem.js')}}"></script>

@endsection
