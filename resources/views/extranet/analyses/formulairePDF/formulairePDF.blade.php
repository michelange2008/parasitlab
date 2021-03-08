@extends('layouts.demandePDFlayout')

@section('content')

  @include('extranet.analyses.formulairePDF.enteteDemandePdfEleveur')

  @include('extranet.analyses.formulairePDF.demandePdfAnalyse')

@endsection
