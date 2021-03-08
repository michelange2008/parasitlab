@extends('layouts.app')

@section('menu')

  @include("extranet.menuExtranet")

@endsection

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-md-10">

        @include('fragments.analysesProgress')

      </div>

    </div>

    <div class="row my-3 justify-content-center">

      <div class="col-md-10">

        @titre(['titre' => "Interpréter les résultats d'analyse", 'icone' => 'interpreter.svg'])

      </div>

      <div class="col-md-10">

        <ul class="list-unstyled">

          @foreach ($interpreter as $element)
            <li class="media mb-4">

              <img class="img-200 mr-3" src="{{url('storage/img/analyses/interpreter/'.$element->image)}}" alt="image">

              <div class="media-body">

                <h4 class="mt-0">@lang($element->lang.'titre')</h4>

                <p>@lang($element->lang.'p1')</p>
                <p>@lang($element->lang.'p2')</p>
                <p>@lang($element->lang.'p3')</p>

              </div>

            </li>

          @endforeach

        </ul>





      </div>

    </div>

  </div>

@endsection
