{{-- issu du tableau listant les anaitems (cad la liste des parasites recherchés) --}}
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
        {{-- formulaire de modification d'un anaitem --}}
        <form id="form_anaitem" action="{{ route('anaitems.update', $anaitem->id) }}" method="post" enctype="multipart/form-data" >

          @csrf

          @method('PUT')

            <div class="form-row">

              <div class="form-group col-md-4">
                {{-- champs abbréviation --}}
                <label for="abbreviation">@lang('form.abbr')</label>
                <input type="text" class="form-control" name="abbreviation" maxlength="4" value="{{ old('abbreviation') ?? $anaitem->abbreviation }}">

              </div>

              <div class="form-group col-md-8">
                {{-- champs nom --}}
                <label for="nom">@lang('form.nom')</label>
                <input type="text" class="form-control" name="nom" value="{{ old('nom') ?? $anaitem->nom }}">

              </div>

            </div>

            <div class="form-row">
              {{-- champs unite --}}
              <div class="form-group col-md-6">
                <label for="unite">@lang('form.unites')</label>
                <select id="unite" name="unite" class="form-control">

                  @foreach ($unites as $unite)

                    @if ($anaitem->unite_id == $unite->id)

                      <option value = "{{ $unite->id }}" selected>@lang($unite->type) : @lang($unite->nom)</option>

                    @endif

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

                    @if ($anaitem->qtt_id == $qtt->id)

                      <option value="{{ $qtt->id }}" selected>@lang($qtt->nom)</option>

                    @else

                      <option value="{{ $qtt->id }}">@lang($qtt->nom)</option>

                    @endif

                  @endforeach

                </select>

              </div>

            </div>

            <div class="form-row">

              <div class="col-md-12">

                @include('admin.form.inputImage', [
                  'image' => $anaitem->image ,
                  'chemin' => 'storage/img/icones/oeufs/',
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
        {{-- paragraphe caché au départ destiné à créer une nouvelle unité voir anaitem.js --}}
        <div id="para_unite" style="display:none">

          <h4 class="text-center">@lang('unites.new_unite')</h4>

          <form id="form_unite" action="{{ route('unites.create')}}" method="post">

            @csrf

            <div class="form-group">

              <label for="type">@lang('form.type_unite')</label>
              <select class="form-control" name="type_unite">
                <option value="@lang('unites.qttf')">@lang('unites.qttf')</option>
                <option value="@lang('unites.qltf')">@lang('unites.qltf')</option>
                <option value="@lang('unites.semiqttf')">@lang('unites.semiqttf')</option>
              </select>

            </div>

            <div class="form-group">

              <label for="nom_unite">@lang('form.nom')</label>
              <input class="form-control" type="text" name="nom_unite" value="" required>

            </div>

            @enregistreAnnule(['route' => route('anaitems.index')])

          </form>

        </div>

      </div>


    </div>

  </div>

@endsection

@section('scripts')

  <script src="{{url('js/anaitem.js')}}"></script>

@endsection
