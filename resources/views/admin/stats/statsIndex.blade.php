@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-md-10">

        @include('fragments.flash')

      </div>

    </div>

    <div class="row my-3 justify-content-center">

      <div class="col-md-10">

        @titre(['titre' => __('titres.stats_titre'), 'icone' => 'enpratique.svg'])

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-10">

        @include('admin.stats.statsBase')

      </div>

    </div>

    <hr class="col-md-10 divider">

    <div class="row justify-content-center">

      <div class="col-md-6">

        <canvas id="graph"></canvas>

      </div>

      <div class="col-md-4">

        <canvas id="pie"></canvas>

      </div>

    </div>

  </div>

@endsection

@section('scripts')
    <script src="{{url('js/chart.min.js')}}"></script>

    <script src="{{ url('js/stats.js') }}"></script>
@endsection
