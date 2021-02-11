@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">

    <form action="{{ route('anaactes.update', $anaacte->id) }}" method="post">

      @csrf

      @method('put')


      <div class="row my-3 justify-content-center">

        <div class="col-md-11 col-lg-10 col-xl-9">

          @titre([
            'titre' => $anaacte->anatype->nom,
            'soustitre' => '&nbsp;: '.$anaacte->nom .  '  <span class="badge badge-secondary">'. $anaacte->num .'</span>',
            'icone' => $anaacte->icone->nom,
          ])

        </div>

        <div class="col-md-11 col-lg-10 col-xl-9">

          <h5 class="font-weight-bold">Especes associées à cette analyse</h5>

          @foreach ($anaacte->anatype->especes as $espece)

            <img class="img-90" src="{{ url('storage/img/icones/'.$espece->icone->nom) }}" alt="$espece->icone->nom">

          @endforeach

          <hr class="divider-court">

        </div>

        <div class="col-md-11 col-lg-10 col-xl-9">

          <h5 class="mb-3 font-weight-bold">Paramètres de cette analyse</h5>

          <div class="form-row">

            <div class="col-md-2">

              @inputText([
                'nom' => 'abbreviation',
                'label' => 'abbr',
                'value' => $anaacte->abbreviation,
                'required' => true,
                'maxlength' => 10
              ])

            </div>

            <div class="col-md-10">

              @inputText([
              'nom' => 'nom',
              'label' => 'nom',
              'value' => $anaacte->nom,
              'required' => true,
              ])

            </div>

          </div>

          @inputTextarea([
          'nom' => 'description',
          'label' => 'description',
          'value' => $anaacte->description,
          'required' => true,
          ])

          <div class="form-row my-3">

            <div class="col border mx-1 p-3">

              @inputOuiNon([
              'name' => 'estSerie',
              'intitule' => "estSerie",
              ])

            </div>

            <div class="col border mx-1 p-3">

              @inputOuiNon([
              'name' => 'estAnalyse',
              'intitule' => "estAnalyse",
              ])

            </div>

            <div class="col border mx-1 p-3">

              @inputOuiNon([
              'name' => 'estTarif',
              'intitule' => "estTarif",
              ])

            </div>

          </div>

          <div class="row">

            <div class="col border mx-3">

              @include('admin.form.inputChoixIcone', ['icone' => $anaacte->icone])

            </div>

          </div>

          <div class="form-row my-3">

            <div class="col border border-right-0 ml-1 p-3">

              @inputText([
              'nom' => 'pu_ht',
              'label' => 'pu_ht',
              'value' => $anaacte->pu_ht,
              'type' => 'number',
              'required' => true,
              ])

            </div>

            <div class="col border border-left-0 mr-1 p-3">

              <div class="form-group">

                <label for="tva">@lang('form.tva')</label>

                <select class="form-control" id="tva" name="tva_id">

                  @foreach ($tvas as $tva)

                    @if ($tva->id === $anaacte->tva_id)

                      <option value="{{ $tva->id }}" selected>{{ $tva->taux * 100 . " %" }}</option>

                    @else

                      <option value="{{ $tva->id }}">{{ $tva->taux * 100 . " %" }}</option>

                    @endif

                  @endforeach

                </select>

              </div>

            </div>

          </div>

        </div>

        <div class="col-md-11 col-lg-10 col-xl-9 mb-3">

          @enregistreAnnule(['route' => route('anaactes.index')])

        </div>


    </div>

  </form>

</div>

@endsection
