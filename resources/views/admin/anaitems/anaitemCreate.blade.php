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

      <div class="col-md-7 col-lg-6 col-xl-5">

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
            <div class="form-group col-md-6">
              <label for="unite">@lang('form.unites')</label>
              <select id="unite" name="unite" class="form-control">

                @foreach ($unites as $unite)

                  <option value = "{{ $unite->id }}" >@lang($unite->type) : @lang($unite->nom)</option>

                @endforeach
                {{-- Possibilité de créer une nouvelle unité via anaitem.js --}}
                <option id="new_unite" value = "0" >@lang('form.new')</option>

              </select>

            </div>


            <div class="form-group col-md-4">
              {{-- type d'unité valeur, estimation, presence  --}}
              <label for="qtt">@lang('form.valeurs')</label>
              <select id="qtt" name="qtt" class="form-control">

                @foreach ($qtts as $qtt)

                    <option value="{{ $qtt->id }}">@lang($qtt->nom)</option>

                @endforeach

              </select>

            </div>

          </div>

          <div class="form-row">

            <div class="col-md-12">

              @include('admin.form.inputImage', [
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

    <div class="col-md-4 col-lg-4 col-xl-4 border-left">

      @include('admin.anaitems.uniteCreate')

    </div>


  </div>

</div>

@endsection

@section('scripts')

<script src="{{url('js/anaitem.js')}}"></script>

@endsection
